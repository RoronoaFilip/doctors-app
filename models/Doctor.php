<?php

  namespace models;

  class Doctor extends User
  {
    public int $doctorId;
    public string $specialty;
    public string $education;

    public function __construct($firstName, $lastName, $email, $password, $doctorId, $specialty, $education)
    {
      parent::__construct($firstName, $lastName, $email, $password, 'DOCTOR');
      $this->doctorId = $doctorId;
      $this->specialty = $specialty;
      $this->education = $education;
    }
  }
