<!doctype html>
<html lang="bg">
<head>
    <title>Document</title>
  <?php
    require_once 'shared/head.php';
    include 'shared/session.php';
  ?>
</head>
<body>
<?php
  require_once 'shared/header.php';

  $fullName = '';
  if ($_SESSION['firstName'] && $_SESSION['lastName']) {
    $fullName = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
  } else {
    $fullName = $_SESSION['email'];
  }
?>

<section>
    <h1 class="page-title mt-4">Здравей, <?= $fullName ?></h1>
    <h4>От тук можеш да направиш следното:</h4>
    <ul>
        <li><a href="/byte/profile.php">Профил</a></li>
        <li><a href="/byte/doctors.php">Лекари</a></li>
        <li><a href="/byte/reservations.php">Резервации</a></li>
    </ul>
</section>
</body>
</html>
