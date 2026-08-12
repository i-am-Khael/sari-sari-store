<?php

  declare(strict_types=1);

  namespace Controllers\User;
  use Cores\View;
  use Models\Auth;

  class Profile {

    public function __construct() {
      $auth = new Auth();
      if (!$auth->isAuthenticated) header('Location: /login');
    }

    public function index() : View {
      return View::make('/user/profile');
    }

  }
