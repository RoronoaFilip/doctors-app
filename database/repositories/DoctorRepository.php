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

    public function getAllDoctors($currentUserId): array
    {
      $users = $this->usersRepository->getAllDoctors();
      $doctorsInfo = $this->doctorInfoRepository->getAll();

      $doctors = [];
      /*
        if the current user is a doctor 
        don't show him
      */
      foreach ($users as $user) {
        if($user->id === $currentUserId) {
          continue;
        } 
        
        $filteredArray = array_filter($doctorsInfo, fn($doctorInfo) => $doctorInfo->id === $user->id);
        $doctorInfo = array_shift($filteredArray) ?? null;

        if (!$doctorInfo) {
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

    public function searchByName($name): array
    {
        $users = $this->usersRepository->getAllDoctors();
        $doctorsInfo = $this->doctorInfoRepository->getAll();

        $doctors = [];
        foreach ($users as $user) {
          $doctorInfo = array_filter($doctorsInfo, fn($doctorInfo) => $doctorInfo->id === $user->id)[0] ?? null;
          if (!$doctorInfo) {
            continue;
          }
  
          if($user->firstName === $name || $user->secondName === $name) {
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
        }
  
        return $doctors;
    }

    public function getCurrentDoctor($id): ?Doctor
    {
      $user = $this->usersRepository->getDoctorById($id);
      $doctorInfo = $this->doctorInfoRepository->getById($id);

      $doctor = new Doctor(
        $user->id,
        $user->firstName,
        $user->lastName,
        $user->email,
        $user->profilePicture,
        $doctorInfo->specialty,
        $doctorInfo->education
      );

      return $doctor;
    }
  }
