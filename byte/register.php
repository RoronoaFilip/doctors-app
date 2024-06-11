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
  require_once 'shared/header.php'
?>


<form class="form" method="post" action="/handlers/register.php">
    <h1 class="page-title">Регистрация</h1>
    <fieldset class="input-wrapper">
        <label for="firstName" class="form-label">Име</label>
        <input type="text" min="3" max="50" class="form-control" id="firstName" name="firstName">
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="lastName" class="form-label">Фамилия</label>
        <input type="text" min="3" max="50" class="form-control" id="lastName" name="lastName">
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="email" class="form-label">Електронна поща</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="userType" class="form-label">Тип на потребителя</label>
        <select class="form-select" id="userType" name="userType" required>
            <option value="USER" selected>Потребител</option>
            <option value="DOCTOR">Лекар</option>
        </select>
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="specialty" class="form-label">Специалност</label>
        <input type="text" class="form-control" id="specialty" name="specialty">
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="education" class="form-label">Образование</label>
        <input type="text" class="form-control" id="education" name="education">
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="password" class="form-label">Парола</label>
        <input type="password" min="6" class="form-control" id="password" name="password" required>
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="confirmPassword" class="form-label">Потвърди парола</label>
        <input type="password" min="6" class="form-control" id="confirmPassword" name="confirmPassword" required>
    </fieldset>
    <button type="submit" class="submit-button">Регистриране</button>
</form>
</body>
</html>
