<?php

  class Database
  {
    public $connection;

    public function __construct()
    {

      $host = 'localhost';
      $username = 'admin';
      $password = 'admin';
      $database_name = 'byte';
      $port = 3306;

      $this->connection = new mysqli($host, $username, $password, $database_name, $port);
    }

    public function insert(string $sql, array $values): void
    {
      $stmt = $this->connection->prepare($sql);

      $result = $stmt->execute($values);

      if (!$result) {
        throw new Exception($stmt->error);
      }
    }

    public function select(string $sql, array $values): array
    {
      $stmt = $this->connection->prepare($sql);

      $result = $stmt->execute($values);

      if (!$result) {
        throw new Exception($stmt->error);
      }

      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function closeConnection(): void
    {
      $this->connection->close();
    }
  }