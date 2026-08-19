<?php

  declare(strict_types=1);

  namespace Controllers\User;
  use Cores\View;
  use Cores\Helper;;

  class Profile {

    public function __construct() {
      if (Helper::isAuthenticated()['role'] !== 'common') header('Location: /login');
    }

    public function index() : View {
      return View::make('/user/profile');
    }

  }
