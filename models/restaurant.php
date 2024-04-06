<?php

  class Restaurant
  {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $description;
    public $created_at;

    public function __construct($name, $email, $phone, $description = null)
    {
      $this->name = $name;
      $this->email = $email;
      $this->phone = $phone;
      $this->description = $description;
      $this->created_at = date('Y-m-d H:i:s');
    }

    public static function all(): array
    {
      $db = new Database();

      $sql = "SELECT * FROM restaurants";
      $values = [];

      return $db->execute($sql, $values);
    }

    public static function find($id): Restaurant
    {
      $db = new Database();

      $sql = "SELECT * FROM restaurants WHERE id = ?";
      $values = [$id];

      $result = $db->execute($sql, $values);
      $restaurant = $result[0];

      return new Restaurant($restaurant['name'], $restaurant['email'], $restaurant['phone'], $restaurant['description']);
    }
  }