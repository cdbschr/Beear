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

  public function addUser(): void {
    require_once $this->viewAdmin('users/add-user');
  }

  public function updateUser(int $id): void {
    $object = new \Beear\Models\auth\Users();
    $user = $object->getUserById($id);
    
    require_once $this->viewAdmin('users/update-user');
  }

  // -------- Pages liées aux Bières  --------
  public function manageBeers(): void {
    $object = new \Beear\Models\content\Beers();
    $beers = $object->getAllBeers();

    require_once $this->viewAdmin('beers/manage-beers');
  }
  
  public function addBeer(): void {
    require_once $this->viewAdmin('beers/add-beer');
  }

  public function updateBeer(int $id): void {
    $object = new \Beear\Models\content\Beers();
    $beer = $object->getBeerById($id);

    require_once $this->viewAdmin('beers/update-beer');
  }

  // -------- Pages liées aux Mails(dashboard)  --------
  public function manageMails(): void {
    $mails = \Beear\Models\content\Mails::getAllMails();
    // var_dump($mails);die;

    require_once $this->viewAdmin('mails/manage-mails');
  }
}