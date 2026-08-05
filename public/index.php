<?php

  spl_autoload_register(function($class){
    $fullPath = dirname(__DIR__) . '/app/' . str_replace('\\', '/', lcfirst($class)) . '.php';
    require_once $fullPath;
  });

  $router = new Cores\Router();
  $router
    ->get('/', [Controllers\Home::class, 'index'])
    ->post('/', [Controllers\Home::class, 'storeData']);

  $router->resolveRoutes($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
