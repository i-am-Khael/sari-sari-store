<?php

  declare(strict_types=1);
  namespace Controllers;

  class Logout {

    public function index() {
      session_destroy();
      header('Location: /');
    }

  }
