<?php

  session_start();

  unset($_SESSION["id"]);
  unset($_SESSION["firstName"]);
  unset($_SESSION["lastName"]);
  unset($_SESSION["email"]);
  unset($_SESSION["loginTime"]);

  session_destroy();

  header('Location: /byte/login.php');
