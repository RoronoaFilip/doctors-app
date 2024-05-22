<?php

namespace repositories;

use models\Question;

require_once __DIR__ . '/UsersRepository.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Question.php';

class QuestionRepository extends Repository
{
    private UsersRepository $usersRepository;

    public function __construct()
    {
      parent::__construct('questions');
      $this->usersRepository = new UsersRepository();
    }

    private function constructQuestion($foundQuestion): ?Question
    {
      $question = new Question(
          $foundQuestion['doctor_id'],
          $foundQuestion['user_id'],
          $foundQuestion['question'],
          $foundQuestion['answer']
      );
      $question->id = $foundQuestion['id'] ?? null;

      return $question;
    }

    public function create(Question $question): ?Question
    {
      $result = $this->insert([
          "doctor_id" => $question->doctor_id,
          "user_id" => $question->user_id,
          "question" => $question->question,
          "answer" => $question->answer
      ]);

      if (!$result) {
        return false;
      }

      return $this->getById($this->getLastInsertId());
    }
    
    public function getById($id): ?Question
    {
      $questions = $this->select([
          "id" => $id
      ]);

      if (!$questions) {
        return null;
      }

      return $this->constructQuestion($questions[0]);
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

    public function getNotAnsweredQuestions($doctorId): ?array
    {
        $questionsForDoctor = $this->select([
            'doctor_id' => $doctorId
        ]);
  
        $questions = [];

        if(!$questionsForDoctor) {
            return null;
        }

        foreach ($questionsForDoctor as $questionForDoctor) {
            if(!isset($questionForDoctor['answer']) || $questionForDoctor['answer'] === null) {
                $questions[] = $this->constructQuestion($questionForDoctor);
            }
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
}

?>