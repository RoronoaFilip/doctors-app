<?php

  namespace repositories;

  use models\Doctor;
  use models\User;

  require_once __DIR__ . '/Repository.php';
  require_once __DIR__ . '/PhotoRepository.php';
  require_once __DIR__ . '/UsersRepository.php';
  require_once __DIR__ . '/../../models/User.php';
  require_once __DIR__ . '/../../models/Doctor.php';

  class DoctorInfoRepository extends Repository
  {
    private UsersRepository $usersRepository;

    public function __construct()
    {
      parent::__construct('doctors_info');
      $this->usersRepository = new UsersRepository();
    }

    public function getByUserId($id): ?Doctor
    {
      $user = $this->usersRepository->getById($id);
      if (!$user) {
        return null;
      }

      $doctorInfo = $this->select([
          'user_id' => $id
      ]);

      return $this->constructDoctor($user, $doctorInfo[0]);
    }

    private function constructDoctor(User $user, $doctorInfo): Doctor
    {
      $doctor = new Doctor(
          $user->firstName,
          $user->lastName,
          $user->email,
          $user->password,
          $doctorInfo['user_id'],
          $doctorInfo['specialty'],
          $doctorInfo['education']
      );
      $doctor->id = $user->id;
      $doctor->phone = $user->phone;
      $doctor->profilePicture = $user->profilePicture;
      return $doctor;
    }

    public function getByUser(User $user): ?Doctor
    {
      if ($user->userType !== 'DOCTOR') {
        return null;
      }

      $doctorInfo = $this->select([
          'user_id' => $user->id
      ]);

      return $this->constructDoctor($user, $doctorInfo[0]);
    }

    public function getAll(): array
    {
      $foundDoctors = parent::getAll();

      $doctors = [];
      foreach ($foundDoctors as $foundDoctor) {
        $user = $this->usersRepository->getById($foundDoctor['user_id']);
        $doctors[] = $this->constructDoctor($user, $foundDoctor);
      }

      return $doctors;
    }
  }
