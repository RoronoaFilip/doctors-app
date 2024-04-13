<?php

  class Database
  {
    private $connection;

    public function __construct()
    {
      $host = 'localhost';
      $username = 'admin';
      $password = 'admin';
      $databaseName = 'byte';
      $port = 3306;

      $this->connection = new PDO("mysql:host=$host;dbname=$databaseName", $username, $password);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection(): PDO
    {
      return $this->connection;
    }

    public function close(): void
    {
      $this->connection = null;
    }
  }


