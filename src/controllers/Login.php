<?php

declare(strict_types=1);

namespace Controllers;
use Cores\View;
use Cores\Helper;
use Models\Login as LM;

class Login {

  public function index() :View {
    return View::make('login');
  }

  public function read(): string {

    $username = Helper::sanitizeInput($_POST['username']);
    $password = Helper::sanitizeInput($_POST['password']);

    $result = LM::getUser([$username]);

    $pass = password_verify($password, $result['password']);

    var_dump($result['role']);
    var_dump($pass);

    if ($pass && $result['role'] === 'user') {

      $_SESSION['user_id'] = $result['id'];
      $_SESSION['role'] = $result['role'];
      $_SESSION['username'] = $result['username'];
      $_SESSION['email'] = $result['email'];

      header('Location: profile');

    } elseif ($pass && $result['role'] === 'administrator') {

      $_SESSION['user_id'] = $result['id'];
      $_SESSION['role'] = $result['role'];
      $_SESSION['username'] = $result['username'];
      $_SESSION['email'] = $result['email'];

      header('Location: dashboard');

    } else {

      return LOGIN_FAILED;

    }

  }


}
