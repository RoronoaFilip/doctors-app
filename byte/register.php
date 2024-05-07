<!DOCTYPE html>
<html lang="bg">
<head>
    <title>Регистрация</title>
  <?php
    require_once 'shared/head.php'
  ?>
    <script defer src="/public/js/register.js"></script>
</head>
<body>

<?php
  require_once 'shared/header.php'
?>

<h1 class="page-title mt-4">Регистрация</h1>

<form class="auth-form" method="post" action="/handlers/register.php">
    <div class="mb-3">
        <label for="firstName" class="form-label">Име</label>
        <input type="text" min="3" max="50" class="form-control" id="firstName" name="firstName">
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Фамилия</label>
        <input type="text" min="3" max="50" class="form-control" id="lastName" name="lastName">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Електронна поща</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Парола</label>
        <input type="password" min="6" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Потвърди парола</label>
        <input type="password" min="6" class="form-control" id="confirmPassword" name="confirmPassword">
    </div>
    <div>
        <label for="userType" class="form-label">Тип на потребителя</label>
        <select class="form-select" id="userType" name="userType">
            <option value="USER" selected>Потребител</option>
            <option value="DOCTOR">Лекар</option>
            <option value="ADMIN">Администратор</option>
        </select>
    </div>
    <button type="submit" class="btn primary-btn align-center mt-4">Регистриране</button>
</form>
</body>
</html>
