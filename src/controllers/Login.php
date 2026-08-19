<?php

declare(strict_types=1);

namespace Controllers;
use Cores\View;
use Cores\Helper;
use Models\Login as LM;

class Login {

  public function __construct() {
    Helper::generateToken();
  }

  public function index(string $error = '') :View {
    return View::make('login', ['csrf_token' => $_SESSION['csrf_token'], 'loginFailed' => $error]);
  }

  public function read(): string {

    $username = Helper::sanitizeInput($_POST['username']);
    $password = Helper::sanitizeInput($_POST['password']);

    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']))
    return (string) $this->index(LOGIN_FAILED);

    $result = LM::getUser([$username]);

    if (!$result) return (string) $this->index(LOGIN_FAILED);

    $pass = password_verify($password, $result['password']);

    if ($pass && $result['role'] === 'common') {

      Helper::setSession($result);
      header('Location: profile');

    } elseif ($pass && $result['role'] === 'administrator') {

      Helper::setSession($result);
      header('Location: dashboard');

    } else {

      return (string) $this->index(LOGIN_FAILED);

    }

  }


}
