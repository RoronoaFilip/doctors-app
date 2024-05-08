<?php
  session_start();

  require_once __DIR__ . '/../database/repositories/UsersRepository.php';
  require_once __DIR__ . '/../database/repositories/DoctorInfoRepository.php';

  use repositories\DoctorInfoRepository;
  use repositories\UsersRepository;

  $userRepository = new UsersRepository();
  $doctorRepository = new DoctorInfoRepository();

  $name = $_POST['firstName'] ?? null;
  $lastName = $_POST['lastName'] ?? null;
  $email = $_POST['email'];
  $phone = $_POST['phone'] ?? null;

  $specialty = $_POST['specialty'] ?? null;
  $education = $_POST['education'] ?? null;

  if (empty($email)) {
    echo "Моля попълнете всички полета.";
    exit();
  }

  $updatedUser = $userRepository->update($_SESSION['id'], [
      "first_name" => $name,
      "last_name" => $lastName,
      "email" => $email,
      "phone" => $phone,
  ]);

  if ($_SESSION['userType'] === 'DOCTOR') {
    $updatedDoctor = $doctorRepository->update($_SESSION['id'], [
        "specialty" => $specialty,
        "education" => $education,
    ]);
  }

  if (!$updatedUser) {
    echo "Грешка по време на обновяването на профила.";
    exit();
  }

  $_SESSION['firstName'] = $name;
  $_SESSION['lastName'] = $lastName;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;

  if ($_SESSION['userType'] === 'DOCTOR') {
    $_SESSION['specialty'] = $specialty;
    $_SESSION['education'] = $education;
  }

  header('Location: /byte/profile.php');

