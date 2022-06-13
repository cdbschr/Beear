<?php

namespace Beear\Controllers\content;

use Beear\Controllers\Controller;

Class Beers extends Controller {
  public function beerPage($id): void {
    $object = new \Beear\Models\content\Beers();
    $beer = $object->getBeerById($id);

    require_once $this->viewFrontend('home');
  }

  public function updateBeer($data, $id): void {
    $req = new \Beear\Models\content\Beers();
    $req->updateBeer($data, $id);

    header('Location:dashboard.php?action=beers');
  }

  public function deleteBeer($id): void {
    $beer = new \Beear\Models\content\Beers();
    $beer->deleteBeer($id);
    
    header('Location:/dashboard.php?action=beers');
  }
}