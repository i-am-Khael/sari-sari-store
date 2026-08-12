<?php

  spl_autoload_register(function($class){
    $fullPath = dirname(__DIR__) . '/src/' . str_replace('\\', '/', lcfirst($class)) . '.php';
    require_once $fullPath;
  });

  require_once dirname(__DIR__) . '/src/cores/constants.php';

  session_start();

  $router = new Cores\Router();
  $router
    ->get('/', [Controllers\Home::class, 'index'])
    ->get('/login', [Controllers\Login::class, 'index'])
    ->post('/login', [Controllers\Login::class, 'auth'])
    ->get('/profile', [Controllers\User\Profile::class, 'index'])
    ->get('/dashboard', [Controllers\Admin\Dashboard::class, 'index']);

  $router->resolveRoutes($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
