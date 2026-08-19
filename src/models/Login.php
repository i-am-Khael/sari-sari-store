<?php

  declare(strict_types=1);
  namespace Models;
  use Traits\Database;

  class Login {

    use Database;

    public static function getUser(array $params): array|bool {
      $query = "SELECT * FROM users WHERE username = ?";
      return self::read($query, $params);
    }

  }
