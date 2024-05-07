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
    public string $userType;
    public int $profilePictureId;
    public Photo $profilePicture;

    public function __construct($firstName, $lastName, $email, $password, $userType = 'USER')
    {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
      $this->password = $password;
      $this->userType = $userType;
    }
  }
