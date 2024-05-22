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
      echo "<h3>Appointment with Dr. {$doctor->firstName} {$doctor->lastName}</h3>";
      echo "<p>Date: $date</p>";
      echo "<p>Patient: {$user->firstName} {$user->lastName}</p>";
      echo "<p>Comment: $comment</p>";
      echo "</div>";
    }
  }

  $appointmentRepository = new AppointmentRepository();

  $userId = $_SESSION['id'];
  $userType = $_SESSION['userType'];

  if ($userType === 'DOCTOR') {
    $appointments = $appointmentRepository->getByDoctorId($userId);
  } else {
    $appointments = $appointmentRepository->getByUserId($userId);
  }

  $previousAppointments = array_filter($appointments, fn($appointment) => $appointment->date < new DateTime());
  $upcomingAppointments = array_filter($appointments, fn($appointment) => $appointment->date >= new DateTime());

  echo "<div class='appointments-wrapper'>";


  echo "<div class='appointments'>";
  echo "<h4>Previous Appointments:</h4>";

  displayAppointments($previousAppointments);

  echo "</div>";


  echo "<div class='appointments'>";
  echo "<h4>Upcoming Appointments:</h4>";

  displayAppointments($upcomingAppointments);

  echo "</div>";

  echo "</div>";
