<?php
  declare(strict_types=1);

  namespace Controllers;
  use Cores\View;
  use Cores\Validate;
  use Models\Register as RM;

  class Register {

    public function index($params = []) :View {
      return View::make('register', $params);
    }

    public function create() {

      $firstName = (new Validate())->sanitizeInput($_POST['firstName']);
      $lastName = (new Validate())->sanitizeInput($_POST['lastName']);
      $email = (new Validate())->sanitizeInput($_POST['email'], 'email');
      $username = (new Validate())->sanitizeInput($_POST['username'], 'username');
      $password = (new Validate())->sanitizeInput($_POST['password'], 'password');

      $errors = [];

      if (!$email['ok']) $errors['email'] = $email['error'];
      if (!$username['ok']) $errors['username'] = $username['error'];
      if (!$password['ok']) $errors['password'] = $password['error'];

      if(!empty($errors)) return $this->index($errors);

      $result = (new RM())->store([$firstName, $lastName, $email['value'], $username['value'], $password['value']]);
      if ($result) header('Location: login');

    }

  }
