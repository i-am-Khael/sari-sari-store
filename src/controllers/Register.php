<?php
  declare(strict_types=1);

  namespace Controllers;
  use Cores\View;
  use Cores\Helper;
  use Models\Register as RM;

  class Register {

    public function index($params = []) :View {
      return View::make('register', $params);
    }

    public function create() {

      $firstName = Helper::sanitizeInput($_POST['firstName']);
      $lastName = Helper::sanitizeInput($_POST['lastName']);
      $email = Helper::sanitizeInput($_POST['email'], 'email');
      $username = Helper::sanitizeInput($_POST['username'], 'username');
      $password = Helper::sanitizeInput($_POST['password'], 'password');

      $errors = [];

      if (!$email['ok']) $errors['email'] = $email['error'];
      if (!$username['ok']) $errors['username'] = $username['error'];
      if (!$password['ok']) $errors['password'] = $password['error'];

      if(!empty($errors)) return $this->index($errors);

      $result = RM::store([$firstName, $lastName, $email['value'], $username['value'], $password['value']]);
      if ($result) header('Location: login');

    }

  }
