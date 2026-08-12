<?php
  declare(strict_types=1);
  namespace Traits;

  trait Database {

    private object $conn;

    protected function setConnection() :object {

      try {
        $this->conn = new \PDO('mysql:host=127.0.0.1;dbname=sari_sari_store', 'root', '');
      } catch (\PDOException $e) {
        die($e->getMessage());
      }

      return $this->conn;

    }


  }
