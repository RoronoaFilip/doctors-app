<?php

  namespace models;

  class Question
  {
    public $id;
    public $doctor_id
    public $user_id
    public $question
    public $answer

    public function __construct($doctor_id, $user_id, $question, $answer)
    {
      $this->doctor_id = $doctor_id;
      $this->user_id = $user_id;
      $this->question = $question;
      $this->answer = $answer;
    }
  }

?>
