<?php

  /*
    lists all questions which have been asked
  */
  
  $items = '';
  foreach ($questions as $question) {
    $items .= '<div class="question-box">';
    $items .= '<p> Въпрос: ' . $question->question . '</p>';
    if(isset($question->answer)) {
      $items .= '<p> Отговор: ' . $question->answer . '</p>';
    }
    $items .= '</div>';
  }

  echo '<section class="questions-container">';
  echo $items;
  echo '</section>';

?>