<!DOCTYPE html>
<html lang="bg">
<head>
    <title>Профил</title>
    <link rel="stylesheet" href="/public/styles/profile.css">
    <link rel="stylesheet" href="/public/styles/profile-display.css">
    <link rel="stylesheet" href="/public/styles/profile-edit.css">
    <script src="/public/js/profile.js" defer></script>
  <?php
    require_once 'shared/head.php';
    include 'shared/session.php';
  ?>
</head>
<body>

<?php
  require_once 'shared/header.php'
?>


<section class="profile-info">
  <?php
    if (isset($_GET['edit'])) {
      include 'shared/profile_form_edit.php';
    } else {
      include 'shared/profile_form_display.php';
    }
  ?>
</section>
</body>
</html>
