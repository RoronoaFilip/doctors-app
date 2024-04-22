<?php

  namespace models;

  class Restaurant
  {
    public $id;
    public $name;
    public $location;
    public $capacity;
    public $rating;
    public $phone;
    public $email
    public int $profilePictureId;
    public Photo $profilePicture;

    public function __construct($name, $location, $capacity, $rating, $email)
    {
      $this->name = $name;
      $this->location = $location;
      $this->capacity = $capacity;
      $this->rating = $rating;
      $this->email = $email;
    }
  }