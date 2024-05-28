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
        <input type="datetime-local" class="form-control" id="date" name="date">
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="comment" class="form-label">Коментар</label>
        <input type="text" class="form-control" id="comment" name="comment">
    </fieldset>
  <?php
    echo "<input type='hidden' min='6' class='form-control' id='doctorId' name='doctorId' value='$doctorId'>"
  ?>
  <?php
    echo "<input type='hidden' min='6' class='form-control' id='userId' name='userId' value='$userId'>"
  ?>
    <button type="submit" class="submit-button">Запазване на час</button>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var dateTimeInput = document.getElementById('date');
      var now = new Date();
      var year = now.getFullYear();
      var month = ('0' + (now.getMonth() + 1)).slice(-2);
      var day = ('0' + now.getDate()).slice(-2);
      var hours = ('0' + now.getHours()).slice(-2);
      var minutes = ('0' + now.getMinutes()).slice(-2);
      
      var minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
      dateTimeInput.min = minDateTime;
  });
</script>
</body>
</html>
