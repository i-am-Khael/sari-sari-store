<?php
  declare(strict_types=1);
  namespace Traits;

  trait Database {

    private ?\PDO $conn = null;

    private function setConnection() :\PDO {

      if ($this->conn instanceof \PDO) return $this->conn;

      $dsn = 'mysql:host=127.0.0.1;dbname=sari_sari_store;charset=utf8mb4';
      $user = 'root';
      $password = '';
      $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false,
      ];

      try {

        $this->conn = new \PDO($dsn, $user, $password, $options);
        return $this->conn;

      } catch (\PDOException $e) {

        throw new \RuntimeException('Database connection failed!');

      }

    }


    protected function create(string $query, array $params): bool {
      $stmt = $this->setConnection()->prepare($query);
      return $stmt->execute($params);
    }


    protected function read(string $query, array $params = []): array {
      $stmt = $this->setConnection()->prepare($query);
      $stmt->execute($params);
      return $stmt->fetchAll();
    }


  }
