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

    $user = $userRepository->getByEmail($email);
    $questions = $questionsRepository->getQuestions($user->id) ?? [];

    $items = '';
    foreach ($questions as $question) {
        $items .= '<div class="list-item__content">';
        $items .= '<div>';
        $items .= '<p> Въпрос: ' . $question->question . '</p>';
        $items .= '<form method="POST" action="process_answer.php">';
        $items .= '<input type="hidden" name="question_id" value="' . $question->id . '">';
        $items .= '<label for="answer_' . $question->id . '">Отговор</label>';
        $items .= '<input type="text" id="answer_' . $question->id . '" name="answer">';
        $items .= '<button type="submit">Запази отговор</button>';
        $items .= '</form>';
        $items .= '</div>';
        $items .= '</div>';
      }
    
      echo '<section class="list">';
      echo $items;
      echo '</section>';
?>