<?php
  require_once '../models/user.php';

  if (isset($error)) {
    unset($_POST['register']);
  }

  if (isset($_POST['register'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confPassword = $_POST['conf_password'];

    if (empty($firstName) ||
        empty($lastName) ||
        empty($email) ||
        empty($password) ||
        empty($conf_password)) {
      $error = 'Моля попълнете всички полета!';
    }

    $user = new User($firstName, $lastName, $email, $password, $confPassword);
    $user->save();
    header('Location: login.php');
  }
?>

<div class="container">
    <h2>Регистрация</h2>

    <form action="register.php" method="post">
        <h3>
          <?php
            if (isset($error)) {
              echo $error;
            }
          ?>
        </h3>
        <label for="firstName">Първо Име</label>
        <input class="input is-link" id="firstName" type="text" name="first_name"
               value="<?= $_POST['first_name'] ?? '' ?>"/>
        <label for="lastName">Второ име</label>
        <input class="input is-link" id="lastName" type="text" name="last_name"
               value="<?= $_POST['last_name'] ?? '' ?>"/>
        <label for="email">Електронна поща</label>
        <input class="input is-link" id="email" type="email" name="email" value="<?= $_POST['email'] ?? '' ?>"/>
        <label for="pass">Парола</label>
        <input class="input is-link" id="pass" type="password" name="password"/>
        <label for="conf-pass">Потвърдете паролата</label>
        <input class="input is-link" id="conf-pass" type="password" name="conf_password"/>

        <button class="button is-link" type="submit" name="register">Регистрация</button>
    </form>

    <a class="is-link" href="/login.php">Вече имате акаунт?</a>
</div>
