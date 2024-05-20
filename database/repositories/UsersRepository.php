<?php


  namespace repositories;

  use models\User;

  require_once __DIR__ . '/Repository.php';
  require_once __DIR__ . '/PhotoRepository.php';
  require_once __DIR__ . '/../../models/User.php';

  class UsersRepository extends Repository
  {
    private PhotoRepository $photoRepository;

    public function __construct()
    {
      parent::__construct('users');
      $this->photoRepository = new PhotoRepository();
    }

    public function create(User $user): bool|User
    {
      $result = $this->insert([
          "email" => $user->email,
          "first_name" => $user->firstName,
          "last_name" => $user->lastName,
          "password" => $user->password,
          "user_type" => $user->userType
      ]);

      if (!$result) {
        return false;
      }

      return $this->getById($this->getLastInsertId());
    }

    public function getById($id): ?User
    {
      $users = $this->select([
          "id" => $id
      ]);

      if (!$users) {
        return null;
      }

      return $this->constructUser($users[0]);
    }

    private function constructUser($foundUser): User
    {
      $user = new User(
          $foundUser['first_name'],
          $foundUser['last_name'],
          $foundUser['email'],
          $foundUser['password'],
          $foundUser['user_type']
      );
      $user->id = $foundUser['id'] ?? null;
      $user->phone = $foundUser['phone'] ?? '';

      $user->profilePictureId = $foundUser['profile_picture_id'] ?? 1;
      $user->profilePicture = $this->photoRepository->getById($user->profilePictureId);
      $user->profilePicture->userId = $user->id;

      return $user;
    }

    public function updateProfilePicture($email, $profilePicturePath): bool|User
    {
      $user = $this->getByEmail($email);
      $photo = $user->profilePicture;

      $newPhoto = $this->photoRepository->updateUserProfilePicture($photo, $profilePicturePath);
      if (!$newPhoto) {
        return false;
      }

      $result = $this->update($user->id, [
          "profile_picture_id" => $newPhoto->id
      ]);

      if (!$result) {
        return false;
      }

      return $this->getById($user->id);
    }

    public function getByEmail($email): ?User
    {
      $users = $this->select([
          "email" => $email
      ]);

      if (!$users) {
        return null;
      }

      return $this->constructUser($users[0]);
    }
    
    public function getAllDoctors(): array
    {
      $doctors = $this->select([
          'user_type' => 'DOCTOR'
      ]);

      $users = [];
      foreach ($doctors as $doctor) {
        $users[] = $this->constructUser($doctor);
      }

      return $users;
    }

    public function getDoctorById($id): ?User 
    {
      $users = $this->select([
        "user_type" => 'DOCTOR',
        "id" => $id
      ]);
      
      if(!$users) {
        return null;
      }

      return $this->constructUser($users[0]);
    }
  }
