<?php

namespace repositories;

use models\Question;

require_once __DIR__ . '/UsersRepository.php';
require_once __DIR__ . '/../../models/User.php';

class QuestionRepository extends Repository
{
    private UsersRepository $usersRepository;

    public function __construct()
    {
      parent::__construct('questions');
      $this->usersRepository = new UsersRepository();
    }

    private function constructQuestion($foundQuestion): Question
    {
      $question = new Question(
          $foundQuestion['doctor_id'],
          $foundQuestion['user_id'],
          $foundQuestion['question'],
          $foundQuestion['answer']
      );

      return $question;
    }

    public function getQuestions($doctorId): ?array
    {   
        $questionsForDoctor = $this->select([
            'doctor_id' => $doctorId
        ]);
  
        $questions = [];

        if(!$questionsForDoctor) {
            return null;
        }

        foreach ($questionsForDoctor as $question_for_doctor) {
          $questions[] = $this->constructQuestion($question_for_doctor);
        }
  
        return $questions;
    }

    public function getQuestionById($questionId): ?Question
    {
        $questions = $this->select([
          'id' => $questionId
        ]);

        if(!$questions) {
            return null;
        }

        return $this->constructQuestion($questions[0]);
    }

    public function updateQuestion($questionId, $answer)
    {
        $question = $this->getQuestionById($questionId);
        $question->answer = $answer;
        //how to save it
    }

    public function addQuestion($user_id, $doctor_id, $question) {
        //add question
    }

}

?>