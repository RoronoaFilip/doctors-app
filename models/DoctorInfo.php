<?php

  namespace models;

  class DoctorInfo
  {
    public int $id;
    public string $specialty;
    public string $education;

    public function __construct($id, $specialty, $education)
    {
      $this->id = $id;
      $this->specialty = $specialty;
      $this->education = $education;
    }
  }
