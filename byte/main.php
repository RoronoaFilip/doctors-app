<!doctype html>
<html lang="bg">
<head>
    <link rel="stylesheet" href="../public/styles/main.css">
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
    <h1 class="hello-message">Здравей, <?= $fullName ?></h1>
    <h4>От тук можеш да направиш следното:</h4>
    <ul>
        <li><a href="/byte/profile.php" class="main-link">Разгледай своя профил</a></li>
        <li><a href="/byte/doctors.php" class="main-link">Виж всички лекари</a></li>
    </ul>
</section>
</body>
</html>
