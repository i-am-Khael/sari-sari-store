<?php

  declare(strict_types=1);

  namespace Controllers\Admin;
  use Cores\View;
  use Cores\Helper;

  class Dashboard {

    public function __construct() {
      Helper::isAuthenticated('administrator');
    }

    public function index() : View {
      return View::make('/admin/dashboard');
    }

    public function products() : View {
      return View::make('/admin/products');
    }

    public function categories() : View {
      return View::make('/admin/categories');
    }

  }
