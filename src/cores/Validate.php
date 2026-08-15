<?php

  declare(strict_types=1);

  namespace Cores;
  use Traits\Database;

  class Validate {

    use Database;

    public bool $isAuthenticated = false;

    public function isAuthenticated(): bool {
      return (bool) $this->read('SELECT id FROM users WHERE id = ?', [$_SESSION['user_id']]);
    }


    public function checkUser(string $username): bool {
      return (bool) $this->read('SELECT username FROM users WHERE username = ?', [$username]);
    }


    public function checkEmail(string $email): bool {
      return (bool) $this->read('SELECT email FROM users WHERE email = ?', [$email]);
    }


    public function sanitizeInput(string|int $value, string $type = ''): string|array {

      $value = (string) $value;
      $value = stripslashes($value);
      $value = trim($value);

      switch ($type) {

        case 'username':
              $username = strip_tags($value);
              if(!preg_match('/^[a-zA-Z\d]+$/', $username)) return [ 'ok' => false, 'error' => USERNAME_ERROR ];
              if($this->checkUser($username)) return [ 'ok' => false, 'error' => USERNAME_EXISTS ];
              return [ 'ok' => true, 'value' => $username];

        case 'password':
              $password = strip_tags($value);
              if(!preg_match('/^[a-zA-Z\d.+-_!@#$%&*()<>?:;"",]{8,255}+$/', $password)) return [ 'ok' => false, 'error' => PASSWORD_ERROR ];
              return [ 'ok' => true, 'value' => password_hash($password, PASSWORD_BCRYPT) ];

        case 'email':
              $email = filter_var($value, FILTER_VALIDATE_EMAIL);
              if(!$email) return [ 'ok' => false, 'error' => EMAIL_ERROR ];
              if($this->checkEmail($email)) return [ 'ok' => false, 'error' => EMAIL_EXISTS ];
              return [ 'ok' => true, 'value' => $email];

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
