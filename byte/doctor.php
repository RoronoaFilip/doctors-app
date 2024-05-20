<!DOCTYPE html>
<html lang="bg">
<head>
    <link rel="stylesheet" href="/public/styles/doctor.css">
</head>
<body>
<?php
  require_once 'shared/header.php'
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

  $item = '<div class="list-item__content">';
  $item .= '<img class="doctor-photo" src="' . $doctor->profilePicture->url . '" alt="profile picture">';
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
?>
<div>
    <button type="button" onclick="location.href='/byte/reservations.php'">Направи Резервация</button>
</div>
<div>
    <h2>Въпроси</h2>
    <div>
        <button type="button" id="askQuestionBtn">Задай Въпрос</button>
        <div id="questionForm" style="display: none;">
            <form method="post" action="submit_question.php">
                <label for="answer">Въпрос:</label>
                <input type="text" id="answer" name="answer">
                <button type="submit" name="submitQuestionBtn">Изпрати</button>
            </form>
        </div>
    </div>
  <?php
    include "questions_list.php";
  ?>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var askQuestionBtn = document.getElementById('askQuestionBtn');
        var questionForm = document.getElementById('questionForm');

        askQuestionBtn.addEventListener('click', function () {
            questionForm.style.display = 'block';
        });
    });
</script>
</body>

