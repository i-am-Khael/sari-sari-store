<?php

declare(strict_types=1);
namespace Controllers;

use Cores\View;

class Home {

  public function index() :View {
    return View::make('home');
  }

}
