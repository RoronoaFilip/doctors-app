<?php

  namespace models;

  class User
  {
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $password;
    public string $phone;
    public int $profilePictureId;
    public Photo $profilePicture;

    public function __construct($firstName, $lastName, $email, $password)
    {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
      $this->password = $password;
    }
  }