<?php

  global $doctors;
  $items = '';
  foreach ($doctors as $doctor) {
    $items .= '<div class="list-item__content">';
    $items .= '<img class="doctor-photo" src="' . $doctor->profilePicture->url . '" alt="profile picture">';
    $items .= '<div class="doctor-info">';
    $items .= '<h3>' . $doctor->firstName . ' ' . $doctor->lastName . '</h3>';
    $items .= '<p> Специалност: ' . $doctor->specialty . '</p>';
    $items .= '<p> Образование: ' . $doctor->education . '</p>';
    $items .= '<button type="button" class="profile-button" onclick="location.href=\'/byte/doctor.php?id=' . $doctor->id . '\'">Виж Профил</button>';
    $items .= '</div>';
    $items .= '</div>';
  }

  echo $items;
