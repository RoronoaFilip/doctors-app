<!doctype html>
<html lang="bg">
<head>
    <title>Document</title>
  <?php
    require_once 'shared/head.php';
    include 'shared/session.php';
  ?>
</head>
<body>
<?php
  require_once 'shared/header.php';
?>

<section class="container">
    <h2>Ресторанти</h2>

    // <?php
    //    $byte = Restaurant::all();
    //    foreach ($byte as $restaurant) {
    //      echo "<div class='restaurant'>";
    //      echo "<h3>{$restaurant['name']}</h3>";
    //      echo "<p>{$restaurant['description']}</p>";
    //      echo "<a href='/restaurant/{$restaurant['id']}'>Виж менюто</a>";
    //      echo "</div>";
    //    }
    //  ?>

  <?php
    var_dump($_SESSION);
  ?>

    <a href="/byte/logout.php">Изход</a>
</section>
</body>
</html>