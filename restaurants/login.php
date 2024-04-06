<section class="container">
    <h2>Вход</h2>

    <form action="login.php" method="post">
        
        <label for="email">Електронна поща</label>
        <input class="input is-link" id="email" type="email" name="email" value="<?= $_POST['email'] ?? '' ?>"/>
        <label for="pass">Парола</label>
        <input class="input is-link" id="pass" type="password" name="password"/>

        <button class="button is-link" type="submit" name="login">Вход</button>
    </form>

    <a class="is-link" href="/register.php">Нямате акаунт?</a>
</section>

<?php
  require_once '../models/user.php';

  if (isset($error)) {
    unset($_POST['login']);
  }

  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
      $error = 'Моля попълнете всички полета!';
    }

    $user = User::verifyCredentials($email, $password);

    if ($user === null) {
      $error = 'Грешен имейл или парола!';
    } else {
      session_start();
      $_SESSION['id'] = $user['id'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['first_name'] = $user['first_name'];
      $_SESSION['last_name'] = $user['last_name'];

      header('Location: main.php');
    }
  }
?>
