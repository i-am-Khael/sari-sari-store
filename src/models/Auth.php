<?php
  declare(strict_types=1);

  namespace Models;
  use Traits\Database;

  class Auth {
    use Database;

    public bool $isAuthenticated = false;

    private function isAuthorized() :bool {

      $conn = $this->setConnection();
      $stmt = $conn->prepare('SELECT role FROM users WHERE id = :id');
      $stmt->bindParam(':id', $_SESSION['user_id'], \PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(\PDO::FETCH_ASSOC);

      return $this->isAuthenticated = (bool) $result;

    }

  }
