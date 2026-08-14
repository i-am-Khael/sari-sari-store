<?php

  declare(strict_types=1);

  namespace Controllers\User;
  use Cores\View;
  use Cores\Validate;

  class Profile {

    public function __construct() {
      if (!(new Validate())->isAuthenticated) header('Location: /login');
    }

    public function index() : View {
      return View::make('/user/profile');
    }

  }
