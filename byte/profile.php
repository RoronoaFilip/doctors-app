<!DOCTYPE html>
<html lang="bg">
<head>
    <title>Профил</title>
  <?php
    require_once 'shared/head.php';
    include 'shared/session.php';
  ?>
</head>
<body>

<?php
  require_once 'shared/header.php'
?>


<section class="profile-info">
  <?php

    if (!isset($_SESSION)) {
      session_start();
    }
    $fullName = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
    $profilePictureUrl = $_SESSION['profilePictureUrl'];

    $items = <<<EOT
    <div class="name-pic">
      <img class="profile-picture" src="$profilePictureUrl" alt="profile-picture">
      <h2>$fullName</h2>
    </div>
EOT;

    echo $items;
  ?>
</section>
</body>
</html>