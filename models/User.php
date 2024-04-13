<?php

  namespace models;

  class User
  {
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $phone;
    public $profilePictureUrl;

    public function __construct($firstName, $lastName, $email, $password)
    {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
      $this->password = $password;
    }

    public function setPhone($phone)
    {
      $this->phone = $phone;
    }

    public function setProfilePictureUrl($profilePictureUrl)
    {
      $this->profilePictureUrl = $profilePictureUrl;
    }
  }