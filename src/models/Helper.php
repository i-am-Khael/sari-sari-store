<?php

  declare(strict_types=1);

  namespace Models;
  use Traits\Database;

  class Helper {

    use Database;


    public static function isAuthenticated(): array|bool {
      return self::read('SELECT role FROM users WHERE id = ?', [$_SESSION['user_id'] ?? '']);
    }


    public static function checkUser(string $username): bool {
      return (bool) self::read('SELECT username FROM users WHERE username = ?', [$username]);
    }


    public static function checkEmail(string $email): bool {
      return (bool) self::read('SELECT email FROM users WHERE email = ?', [$email]);
    }

  }
