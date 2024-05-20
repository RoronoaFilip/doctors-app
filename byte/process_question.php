<?php
/*
    file which process the question
    and updates it
*/

require_once __DIR__ . '/../database/repositories/QuestionRepository.php';

use repositories\QuestionRepository;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questionId = isset($_POST['question_id']) ? trim($_POST['question_id']) : '';
    $answer = isset($_POST['answer']) ? trim($_POST['answer']) : '';

    if (!empty($questionId) && !empty($answer)) {
        $questionRepository = new QuestionRepository();
        $question = $questionRepository->getQuestionById($questionId);

        if ($question) {
            $questionRepository->updateQuestion($questionId, $answer);

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Question not found.";
        }
    }
} else {
    echo "Invalid request method.";
}
?>