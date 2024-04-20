<?php


  require_once __DIR__ . '/../database/repositories/UsersRepository.php';

  use repositories\UsersRepository;

  session_start();

  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email) || empty($password)) {
    echo "Моля попълнете всички полета.";
    exit();
  }

  $userService = new UsersRepository();
  $user = $userService->getByEmail($email);
  if (!$user) {
    echo "Невалидни потребителско име или парола.";
    exit();
  }

  $storedPassword = $user->password;
  if (password_verify($password, $storedPassword)) {
    $_SESSION['id'] = $user->id;
    $_SESSION['email'] = $user->email;
    $_SESSION['firstName'] = $user->firstName;
    $_SESSION['phone'] = $user->phone;
    $_SESSION['lastName'] = $user->lastName;
    $_SESSION['profilePictureUrl'] = $user->profilePicture->url ?? '';
    $_SESSION['loginTime'] = time();
    header('Location: /byte/main.php');
  } else {
    echo "Невалидни потребителско име или парола.";
  }
