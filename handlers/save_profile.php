<?php
  session_start();

  require_once __DIR__ . '/../database/repositories/UsersRepository.php';

  use repositories\UsersRepository;

  $userService = new UsersRepository();

  $name = $_POST['firstName'] ?? null;
  $lastName = $_POST['lastName'] ?? null;
  $email = $_POST['email'];
  $phone = $_POST['phone'] ?? null;

  if (empty($email)) {
    echo "Моля попълнете всички полета.";
    exit();
  }

  $updatedUser = $userService->update($_SESSION['id'], [
      "first_name" => $name,
      "last_name" => $lastName,
      "email" => $email,
      "phone" => $phone,
  ]);

  if (!$updatedUser) {
    echo "Грешка по време на обновяването на профила.";
    exit();
  }

  $_SESSION['firstName'] = $name;
  $_SESSION['lastName'] = $lastName;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;

  header('Location: /byte/profile.php');

