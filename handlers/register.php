<?php

  require_once __DIR__ . '/../database/repositories/UsersRepository.php';
  require_once __DIR__ . '/../models/User.php';

  use models\User;
  use repositories\UsersRepository;

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

// Validations
  if (empty($email) || empty($password) || empty($name) || empty($surname) || empty($confirmPassword)) {
    echo "Моля попълнете всички полета.";
    exit();
  }

  if ($password !== $confirmPassword) {
    echo "Паролите трябва да съвпадат.";
    exit();
  }

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check if the username already exists
  $userService = new UsersRepository();

  if ($userService->getByEmail($email)) {
    echo "Потребител с това потребителско име вече съществуава. Моля избере друго потребителско име.";
    exit();
  }

// Insert the user data into the database
  $createdUser = $userService->create(new User($name, $surname, $email, $hashedPassword));
  if (!$createdUser) {
    echo "Грешка по време на регистрацията.";
    exit();
  }

  session_start();

  $_SESSION['id'] = $createdUser->id;
  $_SESSION['email'] = $createdUser->email;
  $_SESSION['firstName'] = $createdUser->firstName;
  $_SESSION['lastName'] = $createdUser->lastName;
  $_SESSION['loginTime'] = time();
  header('Location: /byte/main.php');

