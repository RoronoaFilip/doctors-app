<?php

  namespace repositories;

  use models\User;

  require_once __DIR__ . '/Repository.php';
  require_once __DIR__ . '/PhotoRepository.php';
  require_once __DIR__ . '/../../models/Restaurant.php';

  class RestaurantRepository extends Repository
  {
    private PhotoRepository $photoRepository;

    public function __construct()
    {
      parent::__construct('restaurants');
      $this->photoRepository = new PhotoRepository();
    }

    public function create(Restaurant $restaurant): bool|Restaurant
    {
      $result = $this->insert([
          "name" => $restaurant->name,
          "location" => $restaurant->location,
          "capacity" => $restaurant->capacity,
          "rating" => $restaurant->rating,
          "email" => $restaurant->email

      ]);

      if (!$result) {
        return false;
      }

      return $this->getById($this->getLastInsertId());
    }

    public function getById($id): ?Restaurant
    {
      $restaurants = $this->select([
          "id" => $id
      ]);

      if (!$restaurants) {
        return null;
      }

      return $this->constructRestaurant($restaurants[0]);
    }

    private function constructRestaurant($newRestaurant): Restaurant
    {
      $restaurant = new Restaurant(
          $newRestaurant['name'],
          $newRestaurant['location'],
          $newRestaurant['capacity'],
          $newRestaurant['rating'],
          $newRestaurant['email'],
      );
      $restaurant->id = $newRestaurant['id'] ?? null;
      $restaurant->phone = $newRestaurant['phone'] ?? '';

      $restaurant->profilePictureId = $newRestaurant['profile_picture_id'] ?? 1;
      $restaurant->profilePicture = $this->photoRepository->getById($restaurant->profilePictureId);
      $restaurant->profilePicture->userId = $restaurant->id;

      return $restaurant;
    }

    public function getByEmail($email): ?Restaurant
    {
      $restaurants = $this->select([
          "email" => $email
      ]);

      if (!$restaurants) {
        return null;
      }

      return $this->constructUser($restaurants[0]);
    }
  }