<?php
  declare(strict_types=1);

  namespace Controllers;
  use Cores\View;
  use Cores\Validate;
  use Models\Register as RegisterModel;

  class Register {

    public function index() :View {
      return View::make('register');
    }

    public function create() {

      $rm = new RegisterModel();

      $firstName = Validate::sanitizeInput($_POST['firstName']);
      $lastName = Validate::sanitizeInput($_POST['lastName']);
      $email = Validate::sanitizeInput($_POST['email'], 'email');
      $username = Validate::sanitizeInput($_POST['username']);
      $password = Validate::sanitizeInput($_POST['password']);

      $result = $rm->store([$firstName, $lastName, $email, $username, $password]);

      if ($result) {
        var_dump('test created successfully!');
      }

    }

  }
