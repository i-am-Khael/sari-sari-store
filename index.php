<?php

  require 'utilities/functions.php';
  
  spl_autoload_register(function($class){
    require $_SERVER['DOCUMENT_ROOT'].'/utilities/'.$class.'.php';
  });

  $router = new Router(routes());
  $router->router();
  