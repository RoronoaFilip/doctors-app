<nav id="navbar-container" class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/welcome.php">
            <img class="app-logo" src=""/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <?php
                if (!isset($_SESSION)) {
                  session_start();
                }

                if (key_exists('loginTime', $_SESSION)) {
                  $email = $_SESSION['email'];
                  $fullName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];

                  $items = <<<EOT
                        <li class="nav-item">
                            <a class="nav-link" href="/byte/logout.php">Изход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Hello, $fullName</a>
                        </li>
EOT;
                } else {
                  $items = <<<EOT
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/byte/register.php">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/byte/login.php">Вход</a>
                        </li>
EOT;
                }
                echo $items;
              ?>
            </ul>
        </div>
    </div>
</nav>

