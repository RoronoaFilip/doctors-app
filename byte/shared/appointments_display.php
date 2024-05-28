<?php
  require_once __DIR__ . '/../../database/repositories/AppointmentRepository.php';

  use repositories\AppointmentRepository;

  function displayAppointments(array $appointments): void
  {
    foreach ($appointments as $appointment) {
      $doctor = $appointment->doctor;
      $user = $appointment->user;
      $date = $appointment->date->format('Y-m-d H:i');
      $comment = $appointment->comment;

      echo "<div class='appointment'>";
      echo "<h3>Преглед при др. {$doctor->firstName} {$doctor->lastName}</h3>";
      echo "<p>Дата: $date</p>";
      echo "<p>Пациент: {$user->firstName} {$user->lastName}</p>";
      echo "<p>Коментар: $comment</p>";
      echo "</div>";
    }
  }

  function getTimestamp(DateTime $dateTime): int
  {
    $newDate = new DateTime($dateTime->format('Y-m-d H:i'));
    return $newDate->getTimestamp();
  }

  $appointmentRepository = new AppointmentRepository();

  $userId = $_SESSION['id'];
  $userType = $_SESSION['userType'];

  if ($userType === 'DOCTOR') {
    $appointments = $appointmentRepository->getByDoctorId($userId);
  } else {
    $appointments = $appointmentRepository->getByUserId($userId);
  }

  $currentDateTime = new DateTime('now', new DateTimeZone('Europe/Sofia'));
  $previousAppointments = array_filter($appointments, fn($appointment) => getTimestamp($appointment->date) < getTimestamp($currentDateTime));
  $upcomingAppointments = array_filter($appointments, fn($appointment) => getTimestamp($appointment->date) >= getTimestamp($currentDateTime));

  echo "<div class='appointments-wrapper'>";

  echo "<div class='flex-column'>";
  echo "<h4>Минали прегледи:</h4>";
  echo "<div class='appointments'>";


  displayAppointments($previousAppointments);

  echo "</div>";
  echo "</div>";


  echo "<div class='flex-column'>";
  echo "<h4>Предстоящи прегледи:</h4>";
  echo "<div class='appointments'>";

  displayAppointments($upcomingAppointments);

  echo "</div>";
  echo "</div>";

  echo "</div>";
