<?php

  require_once __DIR__ . '/../database/repositories/UsersRepository.php';
  require_once __DIR__ . '/../database/repositories/DoctorInfoRepository.php';

  use models\DoctorInfo;
  use models\User;
  use repositories\DoctorInfoRepository;
  use repositories\UsersRepository;

  $firstName = $_POST['firstName'] ?? null;
  $lastName = $_POST['lastName'] ?? null;
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $userType = $_POST['userType'];
  $specialty = $_POST['specialty'] ?? null;
  $education = $_POST['education'] ?? null;

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

  $userRepository = new UsersRepository();
  $doctorRepository = new DoctorInfoRepository();

  if ($userRepository->getByEmail($email)) {
    // TODO: move these echos (in login also) to the form and display them there
    echo "Потребител с този имейл вече съществуава. Моля избере друго потребителско име.";
    exit();
  }

  $newUser = new User($firstName, $lastName, $email, $hashedPassword, $userType);
  $createdUser = $userRepository->create($newUser);

  if ($userType === 'DOCTOR') {
    $newUser = new DoctorInfo($createdUser->id, $specialty, $education);
    $createdDoctorInfo = $doctorRepository->create($newUser);
  }

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
  if ($userType === 'DOCTOR') {
    $_SESSION['specialty'] = $createdDoctorInfo->specialty;
    $_SESSION['education'] = $createdDoctorInfo->education;
  }

  header('Location: /byte/main.php');
?>
