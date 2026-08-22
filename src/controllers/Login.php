<?php

declare(strict_types=1);

namespace Controllers;
use Cores\View;
use Cores\Helper;
use Models\Auth;

class Login {

  public function __construct() {
    Helper::generateToken();
  }

  public function index(string $error = '') :View {
    return View::make('login', ['csrf_token' => $_SESSION['csrf_token'], 'loginFailed' => $error]);
  }

  public function auth(): string {

    $username = Helper::sanitizeInput($_POST['username']);
    $password = Helper::sanitizeInput($_POST['password']);

    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
      return (string) $this->index(LOGIN_FAILED);
    }

    $result = Auth::getUser([$username]);

    if (!$result) return (string) $this->index(LOGIN_FAILED);

    $pass = password_verify( (string) $password, $result['password']);

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
