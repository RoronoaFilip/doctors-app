<?php
/*
    file which process the question
    and updates it
*/

    session_start();

    //require_once __DIR__ . '/../database/repositories/UsersRepository.php';
    //require_once __DIR__ . '/../database/repositories/DoctorInfoRepository.php';
    require_once __DIR__ . '/../database/repositories/QuestionRepository.php';

    use repositories\DoctorInfoRepository;
    use repositories\UsersRepository;
    use repositories\QuestionRepository;

    //$userRepository = new UsersRepository();
    //$doctorRepository = new DoctorInfoRepository();
    $questionRepository = new QuestionRepository();

    $question_id = $_POST['question_id'] ?? null;
    $question = $questionRepository->getById($question_id);
    $answer = $_POST['answer'] ?? null;

    $updatedQuestion = $questionRepository->update($question_id, [
        "doctor_id" => $question->doctor_id,
        "user_id" => $question->user_id,
        "question" => $question->question,
        "answer" => $answer
    ]);

    header('Location: /byte/answer_questions.php')
?>