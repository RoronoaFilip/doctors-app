<?php

  /*
  Lists all reviews with rating (1-5) and comment
*/
  
  $items = '';
  foreach ($reviews as $review) {
    $items .= '<div class="review-box">';
    $items .= '<p> Oценка: ' . $review->rating . '</p>';
    if(isset($review->comment)) {
      $items .= '<p> Коментар: ' . $review->comment . '</p>';
    }
    $items .= '</div>';
  }

  echo '<section class="reviews-container">';
  echo $items;
  echo '</section>';

?>