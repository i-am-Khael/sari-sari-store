<?php

  declare(strict_types=1);

  namespace Models;
  use Traits\Database;


  class Register {

    use Database;

    public function store(array $params): bool {
      $query = 'INSERT INTO users(first_name, last_name, email, username, password) VALUES(?, ?, ?, ?, ?)';
      return $this->create($query, $params);
    }


  }
