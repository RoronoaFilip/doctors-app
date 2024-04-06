<?php
  session_start();
  if (!isset($_SESSION['id'])) {
    header('Location: /login.php');
  }
?>
<!doctype html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section class="container">
    <h2>Ресторанти</h2>

    // <?php
    //    $restaurants = Restaurant::all();
    //    foreach ($restaurants as $restaurant) {
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

    <a href="/logout.php">Изход</a>
</section>
</body>
</html>