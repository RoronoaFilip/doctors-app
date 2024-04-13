<?php

  namespace repositories;

  use models\User;

  require_once __DIR__ . '/Repository.php';
  require_once __DIR__ . '/../../models/User.php';

  class UsersRepository extends Repository
  {
    public function __construct()
    {
      parent::__construct('users');
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

    private function constructUser($foundUser): User
    {
      $user = new User(
          $foundUser['first_name'],
          $foundUser['last_name'],
          $foundUser['email'],
          $foundUser['password'],
      );
      $user->id = $foundUser['id'] ?? null;
      $user->phone = $foundUser['phone'] ?? null;
      $user->profilePictureUrl = $foundUser['profilePictureUrl'] ?? null;

      return $user;
    }

    public function create(User $user)
    {
      return $this->insert([
          "email" => $user->email,
          "first_name" => $user->firstName,
          "last_name" => $user->lastName,
          "password" => $user->password
      ]);
    }
  }