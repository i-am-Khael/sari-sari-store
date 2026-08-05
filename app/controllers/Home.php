<?php

declare(strict_types=1);

namespace Controllers;

class Home {

  public function index() {
    include_once dirname(__DIR__) . '/views/home.php';
  }

  public function storeData() {
    var_dump($_POST['test']);
    $this->index();
  }

}
