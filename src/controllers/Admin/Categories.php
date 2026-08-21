<?php

  declare(strict_types=1);

  namespace Controllers\Admin;
  use Cores\View;

  class Categories {


    public function add(): View {
      return View::make('/admin/categories');
    }


    public function edit() {

    }


  }
