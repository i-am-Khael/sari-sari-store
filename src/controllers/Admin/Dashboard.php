<?php

  declare(strict_types=1);

  namespace Controllers\Admin;
  use Cores\View;
  use Models\Auth;

  class Dashboard {

    public function __construct() {
      $auth = new Auth();
      if (!$auth->isAuthenticated) header('Location: /login');
    }

    public function index() : View {
      return View::make('/user/profile');
    }

  }
