<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
  <?php
    require_once 'shared/head.php'
  ?>
</head>
<body>

<?php
  require_once 'shared/header.php'
?>

<h1 class="page-title">Вход</h1>

<form class="auth-form" action="/handlers/login.php" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Електронна поща</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Парола</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn primary-btn align-center mt-4">Вход</button>
</form>
</body>
</html>
