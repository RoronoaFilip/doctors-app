<nav class="navbar-nav">
  <?php
    if (!isset($_SESSION)) {
      session_start();
    }
    if (key_exists('loginTime', $_SESSION)) {
      $email = $_SESSION['email'];
      $fullName = '';
      if ($_SESSION['firstName'] && $_SESSION['lastName']) {
        $fullName = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
      } else {
        $fullName = $email;
      }

      $items = <<<EOT
                        <div class="nav-item">
                            <a class="nav-link" href="/byte/main.php">Начало</a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link" href="/byte/doctors.php">Доктори</a>
                        </div>
                        <div class="nav-item"><a class="nav-link" href="/byte/profile.php">Профил</a></div>
                        <div class="nav-item">
                            <a class="nav-link" href="/byte/logout.php">Изход</a>
                        </div>
EOT;
    } else {
      $items = <<<EOT
                        <div class="nav-item">
                            <a class="nav-link" aria-current="page" href="/byte/register.php">Регистрация</a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link" href="/byte/login.php">Вход</a>
                        </div>
EOT;
    }
    echo $items;
  ?>
</nav>

