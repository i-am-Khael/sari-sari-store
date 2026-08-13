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

    if ($this->params) extract($this->params);

    ob_start();

    include_once VIEW_PATH . 'partials/_start_tag.php';
    include_once VIEW_PATH . 'partials/nav.php';
    include_once $viewPath;
    include_once VIEW_PATH . 'partials/footer.php';
    include_once VIEW_PATH . 'partials/_end_tag.php';

    return (string) ob_get_clean();
  }


  public function __toString() :string {
    return $this->render();
  }

}
