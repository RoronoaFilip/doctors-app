<?php

  namespace models;

  class Photo
  {
    public $id;
    public string $url;
    public string $alt;
    public $userId;

    public function __construct($url, $alt)
    {
      $this->url = $url;
      $this->alt = $alt;
    }
  }
