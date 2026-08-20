<?php

  declare(strict_types=1);

  namespace Controllers\User;
  use Cores\View;
  use Cores\Helper;;

  class Profile {

    public function __construct() {
      Helper::isAuthenticated('common');
    }

    public function index() : View {
      return View::make('/user/profile');
    }

  }
