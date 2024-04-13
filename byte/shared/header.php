<nav class="navbar-nav">
  <?php
    if (!isset($_SESSION)) {
      session_start();
    }
    if (key_exists('loginTime', $_SESSION)) {
      $email = $_SESSION['email'];
      $fullName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
      $items = <<<EOT
                        <div class="nav-item">Hello, $fullName</div>
                        <div class="nav-item">
                            <a class="nav-link" href="/byte/restaurants.php">Restaurants</a>
                        </div>
                        <div class="nav-item"><a class="nav-link" href="/byte/profile.php">Profile</a></div>
                        <div class="nav-item"><a class="nav-link">Another action</a></div>
                        <div class="nav-item"><a class="nav-link">Something else here</a></div>
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

