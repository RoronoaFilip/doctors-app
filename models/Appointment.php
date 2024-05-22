<?php


  namespace models;

  use DateTime;

  class Appointment
  {
    public $id;
    public Doctor $doctor;
    public User $user;
    public DateTime $date;
    public string $comment;

    public function __construct($id, Doctor $doctor, User $user, DateTime $date, $comment)
    {
      $this->id = $id;
      $this->doctor = $doctor;
      $this->user = $user;
      $this->date = $date;
      $this->comment = $comment;
    }
  }
