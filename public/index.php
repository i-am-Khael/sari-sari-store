<?php

  spl_autoload_register(function($class){
    $fullPath = dirname(__DIR__) . '/src/' . str_replace('\\', '/', lcfirst($class)) . '.php';
    require_once $fullPath;
  });

  use Cores\Helper;
  require_once dirname(__DIR__) . '/src/cores/constants.php';

  Helper::sessionStart();

  $router = new Cores\Router();
  $router
    ->get('/', [Controllers\Home::class, 'index'])
    ->get('/register', [Controllers\Register::class, 'index'])
    ->post('/register', [Controllers\Register::class, 'create'])
    ->get('/login', [Controllers\Login::class, 'index'])
    ->post('/login', [Controllers\Login::class, 'read'])
    ->get('/logout', [Controllers\Logout::class, 'index'])

    // commom user
    ->get('/profile', [Controllers\User\Profile::class, 'index'])

    // admin user
    ->get('/dashboard', [Controllers\Admin\Dashboard::class, 'index']);

  $router->resolveRoutes($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
