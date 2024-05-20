<?php

  $items = '';
  foreach ($doctors as $doctor) {
    $items .= '<div class="list-item__content">';
    $items .= '<img class="doctor-photo" src="' . $doctor->profilePicture->url . '" alt="profile picture">';
    $items .= '<div class="doctor-info">';
    $items .= '<h3>' . $doctor->firstName . ' ' . $doctor->lastName . '</h3>';
    $items .= '<p> Специалност: ' . $doctor->specialty . '</p>';
    $items .= '<p> Образование: ' . $doctor->education . '</p>';
    $items .= '<a href="/byte/doctor.php?id=' . $doctor->id . '">View Profile</a>';
    $items .= '</div>';
    $items .= '</div>';
  }

  echo '<section class="list">';
  echo $items;
  echo '</section>';
?>
