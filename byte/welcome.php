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
  require_once 'shared/header.php';

  if (isset($_SESSION['id'])) {
    header('Location: /byte/main.php');
    exit;
  }
?>

<div class="container">
    <h1 class="header-title">Добре дошли в Byte.</h1>

    <section>
        <h4 class="header-title">Тук можете лесно и удобно да резервирате час при лекар или пък да задавате
            въпроси.</h4>
    </section>

    <section class="register-login-prompt">
        <section class="prompt">
            <h2>Регистрация</h2>
            <p>Ако все още нямате акаунт, можете да се регистрирате от тук.</p>
            <button type="button" class="prompt-button" onclick="location.href='/byte/register.php'">Регистрация
            </button>
        </section>

        <hr class="line-vertical"/>

        <section class="prompt">
            <h2>Вход</h2>
            <p>Ако вече имате акаунт, можете да влезете от тук.</p>
            <button type="button" class="prompt-button" onclick="location.href='/byte/login.php'">Вход</button>
        </section>
    </section>
</div>

</body>
</html>
