<?php

declare(strict_types=1);

namespace Cores;

class Router {

  private array $routes = [];

  public function registerRoute(string $requestMethod, string $route, array $action) :self {
    $this->routes[$requestMethod][$route] = $action;
    return $this;
  }


  public function get(string $route, array $action) :self {
    return $this->registerRoute('GET', $route, $action);
  }


  public function post(string $route, array $action) :self {
    return $this->registerRoute('POST', $route, $action);
  }


  public function resolveRoutes(string $requestMethod, string $route) {

    $route = explode('?', $route)[0];
    $action = $this->routes[$requestMethod][$route] ?? null;

    if (!$action) $this->pageNotFound();

    if (is_array($action)) {

      [$class, $method] = $action;

      if (class_exists($class)) {
        $class = new $class();
        if (method_exists($class, $method)) return call_user_func_array([$class, $method], []);
      }

    }

  }


  public function pageNotFound() {
    include_once dirname(__DIR__) . '/views/_404.php';
  }

}
