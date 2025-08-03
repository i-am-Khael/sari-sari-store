<?php

  function config() {
    return require('utilities/config.php');
  }


  function routes() {
    return require('utilities/routes.php');
  }


  function isActive($uri) {
    return $_SERVER['REQUEST_URI'] === $uri ? 'active' : '';
  }


  function views($path, $data = []) {
    extract($data);
    require "views/{$path}";
  }


  function dd($value) {

    echo "<pre>";
      var_dump($value);
    echo "</pre>";

    die();

  }
