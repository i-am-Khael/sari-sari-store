<?php

  spl_autoload_register(function($class){
    $fullPath = dirname(__DIR__) . '/app/' . str_replace('\\', '/', lcfirst($class)) . '.php';
    require_once $fullPath;
  });

  require_once dirname(__DIR__) . '/app/cores/configs.php';
  require_once dirname(__DIR__) . '/app/cores/constants.php';

  $router = new Cores\Router();
  $router
    ->get('/', [Controllers\Home::class, 'index']);

  $router->resolveRoutes($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
