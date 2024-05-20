<?php

  /*
    lists all questions which have been asked
  */

  $items = '';
  foreach ($questions as $question) {
    $items .= '<div class="list-item__content">';
    $items .= '<div class="doctor-info">';
    $items .= '<p> Въпрос: ' . $question->question . '</p>';
    if(isset($question->answer)) {
      $items .= '<p> Отговор: ' . $question->answer . '</p>';
    }
    $items .= '</div>';
    $items .= '</div>';
  }

  echo '<section class="list">';
  echo $items;
  echo '</section>';

?>