<?php

  declare(strict_types=1);

  namespace Cores;
  use Traits\Database;

  class Validate {

    use Database;

    public bool $isAuthenticated = false;

    public function isAuthenticated() :bool {
      return (bool) $this->read('SELECT id FROM user WHERE id = ?', [$_SESSION['user_id']]);
    }


    public function checkUser(string $username) :bool {
      return (bool) $this->read('SELECT username FROM user WHERE username = ?', [$username]);
    }


    public function checkEmail(string $email) :bool {
      return (bool) $this->read('SELECT email FROM user WHERE email = ?', [$email]);
    }


    public static function sanitizeInput(string|int $value, string $type = '') :string|int {

      $value = (string) $value;
      $value = stripslashes($value);
      $value = trim($value);

      switch ($type) {

        case 'email':
              $email = filter_var($value, FILTER_VALIDATE_EMAIL);
              return ($email !== false) ? $email : '';

        case 'number':
              $number = filter_var($value, FILTER_VALIDATE_INT);
              return ($number !== false) ? (string) $number : '';

        case 'money':
              $money = filter_var($value, FILTER_VALIDATE_FLOAT);
              return ($money !== false) ? (string) $money : '';

        case 'text':
              return strip_tags($value);

        default:
              return strip_tags($value);

      }

    }

  }
