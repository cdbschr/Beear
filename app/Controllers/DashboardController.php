<?php

namespace Beear\Controllers;

class DashboardController extends Controller {
  public function admin(): void {
    include $this->viewAdmin('admin');
  }

  public function managebeers(): void {
    include $this->viewAdmin('beers/manage-beers');
  }
  
  public function addbeer(): void {
    include $this->viewAdmin('beers/add-beer');
  }

  public function updatebeer(): void {
    include $this->viewAdmin('beers/update-beer');
  }

  public function manageusers(): void {
    include $this->viewAdmin('users/manage-users');
  }

  public function addusers(): void {
    include $this->viewAdmin('users/add-users');
  }

  public function updateusers(): void {
    include $this->viewAdmin('users/update-users');
  }
}