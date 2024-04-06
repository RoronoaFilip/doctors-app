<?php
  require_once 'database.php';

  class DbConnection
  {
    private static Database|null $db = null;

    public static function getConnection(): Database
    {
      if (self::$db === null) {
        self::$db = new Database();

      }

      return self::$db;
    }
  }