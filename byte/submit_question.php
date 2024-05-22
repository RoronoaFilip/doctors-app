<?php

    session_start();
    /*
        file to add a question
    */

    require_once __DIR__ . '/../database/repositories/QuestionRepository.php';
    require_once __DIR__ . '/../database/repositories/UsersRepository.php';

    use repositories\QuestionRepository;
    use repositories\UsersRepository;

    use models\Question;

    $questionsRepository = new QuestionRepository();
    $userRepository = new UsersRepository();

    $doctor_id= $_POST['doctor_id'] ?? null;;
    $user_id = $_SESSION['id'] ?? null;
    $question = $_POST['question'] ?? null;
    $answer = null;

    $newQuestion = new Question($doctor_id, $user_id, $question, $answer);
    $createdQuestion = $questionsRepository->create($newQuestion);

    header('Location: /byte/doctor.php?id=' . $doctor_id);
?>