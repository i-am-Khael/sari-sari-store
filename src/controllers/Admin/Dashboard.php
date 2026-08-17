<?php

  declare(strict_types=1);

  namespace Controllers\Admin;
  use Cores\View;
  use Cores\Helper;

  class Dashboard {

    public function __construct() {
      if (Helper::isAuthenticated()['role'] !== 'administrator') header('Location: /login');
      session_destroy();
    }

    public function index() : View {
      return View::make('/admin/dashboard');
    }

  }
