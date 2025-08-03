<?php

  class Router {

    private $routes = [];
    private $route;

    public function __construct($routes) {
      $this->routes = $routes;
      $this->route = parse_url($_SERVER['REQUEST_URI'])['path'];
    }

    public function router() {

      if (array_key_exists($this->route, $this->routes)) {

        require $this->routes[$this->route];
      
      } else {

        $this->abort();

      }

    }


    public function abort($response = 404, $message = "Page not found!") {
    
      $data = [
        'response' => $response,
        'message' => $message
      ];

      views("errors/error.php", $data);

      die();
    
    }

  }