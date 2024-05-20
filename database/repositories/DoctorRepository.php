<?php

  namespace repositories;

  use models\Doctor;

  require_once __DIR__ . '/DoctorInfoRepository.php';
  require_once __DIR__ . '/UsersRepository.php';
  require_once __DIR__ . '/../../models/User.php';
  require_once __DIR__ . '/../../models/Doctor.php';
  require_once __DIR__ . '/../../models/DoctorInfo.php';

  class DoctorRepository
  {
    private UsersRepository $usersRepository;
    private DoctorInfoRepository $doctorInfoRepository;

    public function __construct()
    {
      $this->usersRepository = new UsersRepository();
      $this->doctorInfoRepository = new DoctorInfoRepository();
    }

    public function getById($id): ?Doctor
    {
      $user = $this->usersRepository->getDoctorById($id);
      $doctorInfo = $this->doctorInfoRepository->getById($id);

      return new Doctor(
          $user->id,
          $user->firstName,
          $user->lastName,
          $user->email,
          $user->profilePicture,
          $doctorInfo->specialty,
          $doctorInfo->education
      );
    }

    public function searchByName($name): array
    {
      $users = $this->usersRepository->searchDoctorsByName($name);
      $doctorsInfo = $this->doctorInfoRepository->getAll();

      return $this->constructDoctorsFromArray($doctorsInfo, $users);
    }

    public function constructDoctorsFromArray(array $doctorsInfo, array $users): array
    {
      $doctors = [];
      foreach ($doctorsInfo as $doctorInfo) {
        $filteredDoctors = array_filter($users, fn($user) => $user->id === $doctorInfo->id);
        $user = array_shift($filteredDoctors) ?? null;
        if (!$user) {
          continue;
        }

        $doctors[] = new Doctor(
            $user->id,
            $user->firstName,
            $user->lastName,
            $user->email,
            $user->profilePicture,
            $doctorInfo->specialty,
            $doctorInfo->education
        );
      }
      return $doctors;
    }

    public function searchBySpecialtyAndName($specialty, $name): array
    {
      $doctorsInfo = $this->doctorInfoRepository->searchBySpecialty($specialty);
      $users = $this->usersRepository->searchDoctorsByName($name);

      return $this->constructDoctorsFromArray($doctorsInfo, $users);
    }

    public function searchBySpecialty($specialty): array
    {
      $doctorsInfo = $this->doctorInfoRepository->searchBySpecialty($specialty);
      $users = $this->usersRepository->getAllDoctors();

      return $this->constructDoctorsFromArray($doctorsInfo, $users);
    }

    public function getAllDoctors($currentUserId): array
    {
      $users = $this->usersRepository->getAllDoctors();
      $doctorsInfo = $this->doctorInfoRepository->getAll();

      $doctors = $this->constructDoctorsFromArray($doctorsInfo, $users);
      return array_filter($doctors, fn($doctor) => $doctor->id !== $currentUserId);
    }
  }
