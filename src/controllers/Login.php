<?php

declare(strict_types=1);
namespace Controllers;

use Cores\View;

class Login {

  public function index() :View {
    return View::make('login');
  }

  public function auth() :View {

    $data = [
      "username" => $_POST['username']
    ];

    return View::make('login', $data);

  }


}
