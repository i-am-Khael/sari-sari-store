<?php

  declare(strict_types=1);

  namespace Models;
  use Traits\Database;


  class Register {

    use Database;

    public static function store(array $params): bool {
      $query = 'INSERT INTO users(first_name, last_name, email, username, password) VALUES(?, ?, ?, ?, ?)';
      return self::create($query, $params);
    }


  }
