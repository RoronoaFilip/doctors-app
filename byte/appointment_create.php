<!DOCTYPE html>
<html lang="bg">
<head>
    <title>Регистрация</title>
  <?php
    require_once 'shared/head.php'
  ?>
    <link rel="stylesheet" href="/public/styles/forms.css">
    <script defer src="/public/js/register.js"></script>
</head>
<body>

<?php
  require_once 'shared/header.php';

  require_once __DIR__ . '/../database/repositories/UsersRepository.php';

  use repositories\UsersRepository;

  $userRepository = new UsersRepository();

  $userId = $_SESSION['id'];
  $userFullName = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
  $doctorId = $_GET['doctorId'];

  $doctor = $userRepository->getById($doctorId);
?>


<form class="form" method="post" action="/handlers/appointment_create.php">
    <h1 class="page-title">Запазване на час</h1>

    <h4>Запазвате час за <?= $doctor->firstName . ' ' . $doctor->lastName ?></h4>
    <fieldset class="input-wrapper">
        <label for="date" class="form-label">Дата</label>
        <input type="datetime-local" min="6" class="form-control" id="date" name="date">
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="comment" class="form-label">Коментар</label>
        <input type="text" min="6" class="form-control" id="comment" name="comment">
    </fieldset>
  <?php
    echo "<input type='hidden' min='6' class='form-control' id='doctorId' name='doctorId' value='$doctorId'>"
  ?>
  <?php
    echo "<input type='hidden' min='6' class='form-control' id='userId' name='userId' value='$userId'>"
  ?>
    <button type="submit" class="submit-button">Запазване на час</button>
</form>
</body>
</html>
