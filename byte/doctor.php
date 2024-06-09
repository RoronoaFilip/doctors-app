<!DOCTYPE html>
<html lang="bg">
<head>
    <link rel="stylesheet" href="/public/styles/doctor.css">
</head>
<body>
<?php
  require_once 'shared/head.php';
  require_once 'shared/header.php';
?>
<?php
  require_once __DIR__ . '/../database/repositories/DoctorRepository.php';
  require_once __DIR__ . '/../database/repositories/QuestionRepository.php';

  use repositories\DoctorRepository;
  use repositories\QuestionRepository;

  $doctorRepository = new DoctorRepository();
  $questionsRepository = new QuestionRepository();

  $id = $_GET['id'];
  $doctor = $doctorRepository->getById($id);
  $questions = $questionsRepository->getQuestions($id) ?? [];

  $item = '<div class="doctor-profile">';
  $item .= '<img class="doctor-picture" src="' . $doctor->profilePicture->url . '" alt="profile picture">';
  $item .= '<div class="doctor-info">';
  $item .= '<h3>' . $doctor->firstName . ' ' . $doctor->lastName . '</h3>';
  $item .= '<p> Имейл: ' . $doctor->email . '</p>';
  if (isset($doctor->phone)) {
    $item .= '<p> Телефон: ' . $doctor->phone . '</p>';
  }
  $item .= '<p> Специалност: ' . $doctor->specialty . '</p>';
  $item .= '<p> Образование: ' . $doctor->education . '</p>';
  $item .= '</div>';
  $item .= '</div>';

  echo '<section class="list">';
  echo $item;
  echo '</section>';

  $appointmentRedirectUrl = '/byte/appointments.php?doctorId=' . $id;
?>
<div class="button-container">
    <button type="button" class=""><a class="appointment-href" href="<?= $appointmentRedirectUrl ?>">Запази Час</a>
    </button>
    <button type="button" id="askQuestionBtn">Задай Въпрос</button>
    <button type="button" id="giveReview">Дай рейтинг</button>
    <button type="button" id="seeReview">Виж рейтинги</button>
</div>
<div id="questionForm" style="display: none;">
    <form method="post" action="submit_question.php">
        <label for="question">Въпрос:</label>
        <div class="input-container">
            <input type="text" id="question" name="question">
            <input type="hidden" name="doctor_id" value="<?php echo $id; ?>">
            <button type="submit" name="submitQuestionBtn">Изпрати</button>
        </div>
    </form>
</div>
<div id="reviewForm" style="display: none;">
    <form method="post" action="submit_question.php">
        <label for="question">Коментар:</label>
        <div class="input-container">
            <input type="text" id="question" name="question">
            <input type="hidden" name="doctor_id" value="<?php echo $id; ?>">
            <button type="submit" name="submitQuestionBtn">Изпрати</button>
        </div>
    </form>
</div>
<?php include "questions_list.php"; ?>
<!-- reviews list!!!! -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const askQuestionBtn = document.getElementById('askQuestionBtn');
        const questionForm = document.getElementById('questionForm');

        const giveReviewBtn = document.getElementById('giveReview');
        const reviewForm = document.getElementById('reviewForm');

        askQuestionBtn.addEventListener('click', function () {
            if (questionForm.style.display === 'block') {
                questionForm.style.display = 'none';
            } else {
                questionForm.style.display = 'block';
            }
        });
        giveReviewBtn.addEventListener('click', function () {
            if (reviewForm.style.display === 'block') {
                reviewForm.style.display = 'none';
            } else {
                reviewForm.style.display = 'block';
            }
        });
    });
</script>
</body>
</html>
