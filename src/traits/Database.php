<?php
  declare(strict_types=1);
  namespace Traits;

  trait Database {

    private static ?\PDO $conn = null;

    private static function setConnection() :\PDO {

      if (self::$conn instanceof \PDO) return self::$conn;

      $dsn = 'mysql:host=127.0.0.1;dbname=sari_sari_store;charset=utf8mb4';
      $user = 'root';
      $password = '';
      $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false,
      ];

      try {

        self::$conn = new \PDO($dsn, $user, $password, $options);
        return self::$conn;

      } catch (\PDOException $e) {

        throw new \RuntimeException('Database connection failed!');

      }

    }


    protected static function create(string $query, array $params): bool {
      $stmt = self::setConnection()->prepare($query);
      return $stmt->execute($params);
    }


    protected static function read(string $query, array $params = [], string $all = ''): array|bool {
      $stmt = self::setConnection()->prepare($query);
      $stmt->execute($params);
      return $all === 'all' ? $stmt->fetchAll() : $stmt->fetch();
    }


  }
