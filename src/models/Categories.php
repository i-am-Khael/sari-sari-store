<?php

  declare(strict_types=1);

  namespace Models;
  use Traits\Database;

  class Categories {

    use Database;


    public static function store(string $query, array $params = []): bool {
      return self::create($query, $params);
    }


    public static function getAll(string $query, array $params = []): array|bool {
     return self::read($query, $params, 'all');
    }

  }
