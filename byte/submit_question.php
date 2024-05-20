<?php

    /*
        file to add a question
    */

    require_once __DIR__ . '/../database/repositories/QuestionRepository.php';

    use repositories\QuestionRepository;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitQuestionBtn'])) {
        
        $question = isset($_POST['question']) ? trim($_POST['question']) : '';

        if (!empty($question)) {
            $questionRepository = new QuestionRepository();

            // Call the desired function from your question repository
            $questionRepository->addQuestion($user_id, $doctor_id, $question);
        } else {

        }
    }

?>