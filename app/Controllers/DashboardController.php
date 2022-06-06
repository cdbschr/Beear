<?php

namespace Beear\Controllers;

class DashboardController extends Controller {
  // -------- Page du dashboard  --------
  public function admin(): void {
    require_once $this->viewAdmin('admin');
  }

  // -------- Pages liées à l'authentification  --------
  public function manageUsers(): void {
    $object = new \Beear\Models\auth\Users();
    $users = $object->getAllUsers();

    require_once $this->viewAdmin('users/manage-users');
  }

  public function confirmPageUsers(): void {
    require_once $this->viewAdmin('users/register-confirm');
  }

  public function addUser(): void {
    require_once $this->viewAdmin('users/add-user');
  }

  public function updateUser($id): void {
    $id = \Beear\Models\auth\Users::findBy('id', $id);

    require_once $this->viewAdmin('users/update-user');
  }

  // -------- Pages liées aux Bières  --------
  public function manageBeers(): void {
    // $object = new \Beear\Models\content\Beers($data);
    // $beers = $object->getAllUsers();

    require_once $this->viewAdmin('beers/manage-beers');
  }
  
  public function addBeer(): void {
    require_once $this->viewAdmin('beers/add-beer');
  }

  public function updateBeer($id): void {
    $id = \Beear\Models\content\Beers::findBy('id', $id);

    require_once $this->viewAdmin('beers/update-beer');
  }
}