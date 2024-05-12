<?php

  namespace models;

  class Doctor extends User
  {
    public string $specialty;
    public string $education;

    public function __construct($id, $firstName, $lastName, $email, Photo $profilePicture, $specialty, $education)
    {
      parent::__construct($firstName, $lastName, $email, '', 'DOCTOR');
      $this->id = $id;
      $this->profilePicture = $profilePicture;
      $this->specialty = $specialty;
      $this->education = $education;
    }
  }
