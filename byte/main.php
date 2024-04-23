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

     <?php
       require_once __DIR__ . '/../database/repositories/RestaurantRepository.php';

       use repositories\RestaurantRepository;

       $byte = RestaurantRepository::all();
       foreach ($byte as $restaurant) {
         echo "<div class='restaurant'>";
         echo "<h3>{$restaurant['name']}</h3>";
         echo "<p>{$restaurant['location']}</p>";
         echo "<p>{$restaurant['description']}</p>";
         echo "<p>{$restaurant['rating']}</p>";
         echo "<p>{$restaurant['phone']}</p>";
         echo "<p>{$restaurant['email']}</p>";
         echo "<a href='/restaurant/{$restaurant['id']}'>Виж менюто</a>";
         echo "</div>";
       }
     ?>

  <?php
    var_dump($_SESSION);
  ?>

    <a href="/byte/logout.php">Изход</a>
</section>
</body>
</html>