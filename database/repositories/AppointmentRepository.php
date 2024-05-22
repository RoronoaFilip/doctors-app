<?php

  namespace repositories;

  use DateTime;
  use models\Appointment;

  require_once __DIR__ . '/Repository.php';
  require_once __DIR__ . '/UsersRepository.php';
  require_once __DIR__ . '/DoctorRepository.php';
  require_once __DIR__ . '/../../models/Appointment.php';

  class AppointmentRepository extends Repository
  {

    public function __construct()
    {
      parent::__construct('appointments');
    }

    public function create(Appointment $appointment): ?Appointment
    {
      $this->insert([
          'doctor_id' => $appointment->doctor->id,
          'user_id' => $appointment->user->id,
          'date' => $appointment->date->format('Y-m-d H:i:s'),
          'comment' => $appointment->comment
      ]);

      return $this->getById($this->getLastInsertId());
    }

    public function getById($id): ?Appointment
    {
      $appointments = $this->select([
          'id' => $id
      ]);

      if (!$appointments) {
        return null;
      }

      return $this->constructAppointment($appointments[0]);
    }

    private function constructAppointment($foundAppointment): Appointment
    {
      $doctorRepository = new DoctorRepository();
      $doctor = $doctorRepository->getById($foundAppointment['doctor_id']);

      $usersRepository = new UsersRepository();
      $user = $usersRepository->getById($foundAppointment['user_id']);

      return new Appointment(
          $foundAppointment['id'],
          $doctor,
          $user,
          new DateTime($foundAppointment['date']),
          $foundAppointment['comment']
      );
    }

    public function getByDoctorId($doctorId): array
    {
      $appointments = $this->select([
          'doctor_id' => $doctorId
      ]);

      $appointmentsList = [];
      foreach ($appointments as $appointment) {
        $appointmentsList[] = $this->constructAppointment($appointment);
      }

      return $appointmentsList;
    }

    public function getByUserId($userId): array
    {
      $appointments = $this->select([
          'user_id' => $userId
      ]);

      $appointmentsList = [];
      foreach ($appointments as $appointment) {
        $appointmentsList[] = $this->constructAppointment($appointment);
      }

      return $appointmentsList;
    }
  }
