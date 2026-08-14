<?php

declare(strict_types=1);

namespace Controllers;

use Cores\View;

class Login {

  public function index() :View {
    return View::make('login');
  }

  public function read() :View {
    return View::make('login');
  }


}
