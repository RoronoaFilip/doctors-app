<?php

  namespace repositories;

  use models\DoctorInfo;
  use models\User;

  require_once __DIR__ . '/Repository.php';
  require_once __DIR__ . '/PhotoRepository.php';
  require_once __DIR__ . '/UsersRepository.php';
  require_once __DIR__ . '/../../models/User.php';
  require_once __DIR__ . '/../../models/DoctorInfo.php';

  class DoctorInfoRepository extends Repository
  {
    private UsersRepository $usersRepository;

    public function __construct()
    {
      parent::__construct('doctors_info');
      $this->usersRepository = new UsersRepository();
    }

    public function create(DoctorInfo $doctorInfo): ?DoctorInfo
    {
      $this->insert([
          'id' => $doctorInfo->id,
          'specialty' => $doctorInfo->specialty,
          'education' => $doctorInfo->education
      ]);

      return $doctorInfo;
    }

    public function getByUser(User $user): ?DoctorInfo
    {
      if ($user->userType !== 'DOCTOR') {
        return null;
      }

      $doctorInfo = $this->select([
          'id' => $user->id
      ]);

      return $this->constructDoctor($user->id, $doctorInfo[0]);
    }

    private function constructDoctor(int $userId, $doctorInfo): DoctorInfo
    {
      $doctor = new DoctorInfo(
          $doctorInfo['specialty'],
          $doctorInfo['education']
      );
      $doctor->id = $userId;
      return $doctor;
    }

    public function getAll(): array
    {
      $foundDoctors = parent::getAll();

      $doctors = [];
      foreach ($foundDoctors as $foundDoctor) {
        $user = $this->usersRepository->getById($foundDoctor['id']);
        $doctors[] = $this->constructDoctor($user->id, $foundDoctor);
      }

      return $doctors;
    }

    public function getById($id): ?DoctorInfo
    {
      $user = $this->usersRepository->getById($id);
      if (!$user) {
        return null;
      }

      $doctorInfo = $this->select([
          'id' => $id
      ]);

      return $this->constructDoctor($user->id, $doctorInfo[0]);
    }
  }
