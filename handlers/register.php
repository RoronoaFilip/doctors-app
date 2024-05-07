<?php

  require_once __DIR__ . '/../database/repositories/UsersRepository.php';
  require_once __DIR__ . '/../database/repositories/DoctorInfoRepository.php';

  use models\User;
  use repositories\DoctorInfoRepository;
  use repositories\UsersRepository;

  $firstName = $_POST['firstName'] ?? null;
  $lastName = $_POST['lastName'] ?? null;
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $userType = $_POST['userType'];

  if (empty($email) || empty($password) || empty($confirmPassword || empty($userType)
          || ($userType === 'DOCTOR' && (empty($firstName) || empty($lastName))))) {
    echo "Моля попълнете всички полета.";
    exit();
  }

  if ($password !== $confirmPassword) {
    echo "Паролите трябва да съвпадат.";
    exit();
  }

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $userService = new UsersRepository();

  if ($userService->getByEmail($email)) {
    echo "Потребител с това потребителско име вече съществуава. Моля избере друго потребителско име.";
    exit();
  }

  $createdUser = $userService->create(new User($firstName, $lastName, $email, $hashedPassword, $userType));
  if (!$createdUser) {
    echo "Грешка по време на регистрацията.";
    exit();
  }

  session_start();

  $_SESSION['id'] = $createdUser->id;
  $_SESSION['email'] = $createdUser->email;
  $_SESSION['firstName'] = $createdUser->firstName ?? '';
  $_SESSION['lastName'] = $createdUser->lastName ?? '';
  $_SESSION['userType'] = $createdUser->userType;
  $_SESSION['profilePictureUrl'] = $createdUser->profilePicture->url;
  $_SESSION['phone'] = $createdUser->phone ?? '';
  $_SESSION['loginTime'] = time();

  if ($createdUser->userType === 'DOCTOR') {
    $doctorRepository = new DoctorInfoRepository();
    $doctor = $doctorRepository->getByUser($createdUser);
    $_SESSION['specialty'] = $doctor->specialty;
    $_SESSION['education'] = $doctor->education;
  }

  header('Location: /byte/main.php');

