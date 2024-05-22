<?php

  require_once __DIR__ . '/../database/repositories/AppointmentRepository.php';
  require_once __DIR__ . '/../database/repositories/DoctorRepository.php';
  require_once __DIR__ . '/../database/repositories/UsersRepository.php';

  use models\Appointment;
  use repositories\AppointmentRepository;
  use repositories\DoctorRepository;
  use repositories\UsersRepository;

  $appointmentRepository = new AppointmentRepository();
  $doctorRepository = new DoctorRepository();
  $usersRepository = new UsersRepository();

  $date = $_POST['date'] ?? null;
  $comment = $_POST['comment'] ?? null;
  $doctorId = $_POST['doctorId'] ?? null;
  $userId = $_POST['userId'] ?? null;

  $doctor = $doctorRepository->getById($doctorId);
  $user = $usersRepository->getById($userId);
  $date = new DateTime($date);

  $newAppointment = new Appointment(null, $doctor, $user, $date, $comment);

  $createdAppointment = $appointmentRepository->create($newAppointment);

  if ($createdAppointment) {
    header('Location: /byte/doctor.php?id=' . $doctorId);
  } else {
    echo 'Error creating appointment';
  }
