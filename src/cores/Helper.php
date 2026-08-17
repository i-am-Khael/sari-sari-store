<?php

  declare(strict_types=1);

  namespace Cores;
  use Models\Helper as HM;

  class Helper {

    public static function isAuthenticated(): array|bool {
      return HM::isAuthenticated();
    }


    public static function checkUser(string $username): bool {
      return HM::checkUser($username);
    }


    public static function checkEmail(string $email): bool {
      return HM::checkEmail($email);
    }


    public static function sanitizeInput(string|int $value, string $type = ''): string|array {

      $value = (string) $value;
      $value = stripslashes($value);
      $value = trim($value);

      switch ($type) {

        case 'username':
              $username = strip_tags($value);
              if(!preg_match('/^[a-zA-Z\d]+$/', $username)) return [ 'ok' => false, 'error' => USERNAME_ERROR ];
              if(self::checkUser($username)) return [ 'ok' => false, 'error' => USERNAME_EXISTS ];
              return [ 'ok' => true, 'value' => $username];

        case 'password':
              $password = strip_tags($value);
              if(!preg_match('/^[a-zA-Z\d.+-_!@#$%&*()<>?:;"",]{8,255}+$/', $password)) return [ 'ok' => false, 'error' => PASSWORD_ERROR ];
              return [ 'ok' => true, 'value' => password_hash($password, PASSWORD_BCRYPT) ];

        case 'email':
              $email = filter_var($value, FILTER_VALIDATE_EMAIL);
              if(!$email) return [ 'ok' => false, 'error' => EMAIL_ERROR ];
              if(self::checkEmail($email)) return [ 'ok' => false, 'error' => EMAIL_EXISTS ];
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
