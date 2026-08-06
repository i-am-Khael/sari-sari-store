<?php

declare(strict_types=1);
namespace Cores;

class View {

  protected string $view;
  protected array $params = [];

  public function __construct(string $view, array $params = []) {
    $this->view = $view;
    $this->params = $params;
  }

  public static function make(string $view, array $params = []) :static {
    return new static($view, $params);
  }

  public function render() :string {

    $viewPath = VIEW_PATH . $this->view . '.php';

    if (!file_exists($viewPath)) die();

    ob_start();

    include $viewPath;

    return (string) ob_get_clean();

  }

  public function _toString() :string {
    return $this->render();
  }

}
