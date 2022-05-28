<?php

namespace Beear\Controllers;

class DashboardController extends Controller {
  public function admin(): void {
    require_once $this->viewAdmin('admin');
  }

  public function managebeers(): void {
    require_once $this->viewAdmin('beers/manage-beers');
  }
  
  public function addbeer(): void {
    require_once $this->viewAdmin('beers/add-beer');
  }

  public function updatebeer(): void {
    require_once $this->viewAdmin('beers/update-beer');
  }

  public function manageusers(): void {
    require_once $this->viewAdmin('users/manage-users');
  }

  public function addusers(): void {
    require_once $this->viewAdmin('users/add-users');
  }

  public function updateusers(): void {
    require_once $this->viewAdmin('users/update-users');
  }
}