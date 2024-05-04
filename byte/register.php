<!DOCTYPE html>
<html lang="bg">
<head>
    <title>Регистрация</title>
  <?php
    require_once 'shared/head.php'
  ?>
</head>
<body>

<?php
  require_once 'shared/header.php'
?>

<h1 class="page-title mt-4">Регистрация</h1>

<form class="auth-form" method="post" action="/handlers/register.php">
    <div class="mb-3">
        <label for="name" class="form-label">Име</label>
        <input type="text" min="3" max="50" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="surname" class="form-label">Фамилия</label>
        <input type="text" min="3" max="50" class="form-control" id="surname" name="surname">
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
    <button type="submit" class="btn primary-btn align-center mt-4">Регистриране</button>
</form>
</body>
</html>
