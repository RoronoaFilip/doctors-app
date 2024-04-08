<?php
  require_once '../database/db_connection.php';

  class User
  {
    public int $id;
    public string $email;
    public string $password;
    public string $first_name;
    public string $last_name;

    public function __construct(
        string $first_name,
        string $last_name,
        string $email,
        string $password,
        string $conf_password
    )
    {
      $this->email = $email;
      $this->password = $this->processPassword($password, $conf_password);
      $this->first_name = $first_name;
      $this->last_name = $last_name;
    }

    private function processPassword(string $password, string $conf_password): string
    {
      if ($password !== $conf_password) {
        throw new Exception('Passwords do not match');
      }

      return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function all(): array
    {
      $db = DbConnection::getConnection();

      $sql = "SELECT * FROM users";
      $values = [];

      $users = $db->select($sql, $values);

      $db->connection->close();

      return $users;
    }

    public static function verifyCredentials(string $email, string $password)
    {
      $db = DbConnection::getConnection();

      $sql = "SELECT * FROM users WHERE email = ?";
      $values = [$email];

      $result = $db->select($sql, $values);

      if (empty($result)) {
        return null;
      }

      $foundUser = $result[0];

      $foundUserPassword = $foundUser['password'];

      return password_verify($password, $foundUserPassword)
          ? $foundUser
          : null;
    }

    public function save(): void
    {
      $db = DbConnection::getConnection();

      $sql = "INSERT INTO users ( email, password, first_name, last_name) VALUES ( ?, ?, ?, ?)";
      $values = [$this->email, $this->password, $this->first_name, $this->last_name];

      $db->insert($sql, $values);

    }
  }