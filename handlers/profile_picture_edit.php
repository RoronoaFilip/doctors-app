<?php
  require_once __DIR__ . '/../database/repositories/UsersRepository.php';

  use repositories\UsersRepository;

  session_start();

  $targetDir = '/public/photos/';
  $imagePath = $_FILES['profilePicture']['tmp_name'];
  $targetPath = $targetDir . $_SESSION['email'] . '.png';

  $image = file_get_contents($imagePath);
  move_uploaded_file($imagePath, __DIR__ . '/..' . $targetPath);

  $userRepository = new UsersRepository();
  $result = $userRepository->updateProfilePicture($_SESSION['email'], $targetPath);
  if ($result) {
    $_SESSION['profilePictureUrl'] = $targetPath;
    header('Location: /byte/profile.php');
  } else {
    header('Location: /byte/profile.php?edit=true&errorUploadingImage=true');
  }
