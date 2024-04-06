<?php

  session_start();
  unset($_SESSION["id"]);
  unset($_SESSION["first_name"]);
  unset($_SESSION["last_name"]);
  unset($_SESSION["email"]);
  unset($_SESSION["csrf_token"]);

  session_destroy();

  header('Location: /login.php');
