<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
  <?php
    require_once 'shared/head.php'
  ?>
    <link rel="stylesheet" href="/public/styles/forms.css">
</head>
<body>

<?php
  require_once 'shared/header.php'
?>


<form class="form" action="/handlers/login.php" method="post">
    <h1 class="page-title">Вход</h1>
    <fieldset class="input-wrapper">
        <label for="email" class="form-label">Електронна поща</label>
        <input type="email" class="form-control" id="email" name="email">
    </fieldset>
    <fieldset class="input-wrapper">
        <label for="password" class="form-label">Парола</label>
        <input type="password" class="form-control" id="password" name="password">
    </fieldset>
    <button type="submit" class="submit-button">Вход</button>
</form>
</body>
</html>
