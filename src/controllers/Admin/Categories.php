<?php

  declare(strict_types=1);

  namespace Controllers\Admin;
  use Cores\View;
  use Cores\Helper;
  use Models\Categories as CM;

  class Categories {


    public function add(): void {

      $category = Helper::sanitizeInput($_POST['category']);

      if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        header('Location: /dashboard/categories');
      }

      $result = CM::store('INSERT INTO product_categories(category) VALUES(?)', [$category]);

      if ($result) header('Location: /dashboard/categories');

      header('Location: /dashboard/categories');

    }


    public static function getAll(): array {
      $result = CM::getAll('SELECT id, category FROM product_categories');
      return (array) $result;
    }


    public function edit() {
    }


  }
