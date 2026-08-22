<?php

  declare(strict_types=1);

  namespace Models;
  use Traits\Database;

  class Auth {

    use Database;

    public static function storeUser(array $params): bool {
      $query = 'INSERT INTO users(first_name, last_name, email, username, password) VALUES(?, ?, ?, ?, ?)';
      return self::create($query, $params);
    }

    public static function getUser(array $params): array|bool {
      $query = "SELECT * FROM users WHERE username = ?";
      return self::read($query, $params);
    }


  }
