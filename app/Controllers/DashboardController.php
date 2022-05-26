<?php

namespace Beear\Controllers;

class DashboardController extends Controller {
  public function admin(): void {
    include $this->viewAdmin('admin');
  }

  public function managebeers(): void {
    include $this->viewAdmin('manage-beers');
  }

  public function manageusers(): void {
    include $this->viewAdmin('manage-users');
  }
}