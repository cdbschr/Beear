<?php

namespace Beear\Controllers\content;

use Beear\Controllers\Controller;

Class Beers extends Controller {
	public function beerPage($data): void {
    $id = $data['id'];
    $beers = new \Beear\Models\content\Beers($id);
    $beer = $beers->getBeerById($id);

    require_once $this->viewFrontend('beer');
	}

  public function threeFirstBeers($data): void {
    $id = $data['id'];
    $beers = new \Beear\Models\content\Beers($id);
    $threeFirstBeers = $beers->getThreeFirstBeers();

    require_once $this->viewFrontend('home');
  }

  public function createBeer($dataBeer): void {
    $req = new \Beear\Models\content\Beers();
    $req->createBeer($dataBeer);

    require_once $this->viewAdmin('beers/create-confirm');
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