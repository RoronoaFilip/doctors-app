<?php

  namespace models;

  class Comment
  {
    public $id;
    public $restaurant_id
    public $user_id
    public $comment

    public function __construct($id, $restaurant_id, $user_id, $comment)
    {
      $this->id = $id;
      $this->restaurant_id = $restaurant_id;
      $this->user_id = $user_id;
      $this->comment = $comment;
    }
  }
