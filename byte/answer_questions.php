<?php
  echo '<link rel="stylesheet" href="../public/styles/answer-questions.css">';
?>
<?php
  /*
      file where we process the action of
      answering certain question
  */

  require_once 'shared/head.php';
  require_once 'shared/header.php';
  require_once __DIR__ . '/../database/repositories/UsersRepository.php';
  require_once __DIR__ . '/../database/repositories/QuestionRepository.php';

  use repositories\QuestionRepository;
  use repositories\UsersRepository;

  $userRepository = new UsersRepository();
  $questionsRepository = new QuestionRepository();

  $doctor = $userRepository->getByEmail($email);
  $questions = $questionsRepository->getNotAnsweredQuestions($doctor->id) ?? [];

  $items = '';
  foreach ($questions as $question) {
    $items .= '<div class="question-box">';
    $items .= '<div>';
    $items .= '<p> Въпрос: ' . $question->question . '</p>';
    $items .= '<form method="POST" action="process_question.php">';
    $items .= '<input type="hidden" name="question_id" value="' . $question->id . '">';
    $items .= '<label for="answer">Отговор: </label>';
    $items .= '<input type="text" id="answer" name="answer">';
    $items .= '<button type="submit" class="question-button">Запази отговор</button>';
    $items .= '</form>';
    $items .= '</div>';
    $items .= '</div>';
  }

  echo '<section class="questions-container">';
  echo $items;
  echo '</section>';
?>
