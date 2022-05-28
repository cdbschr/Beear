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

  public function threeLastBeers($data): void {
    $id = $data['id'];
    $beers = new \Beear\Models\content\Beers($id);
    $threeLastBeers = $beers->getThreeLastBeers();

    require_once $this->viewFrontend('home');
  }

  public function createBeer($data): void {
    $beers = new \Beear\Models\content\Beers($data);
    $beers->createBeer($data);

    require_once $this->viewAdmin('/beers/manage-beers');
  }

  public function updateBeer($data): void {
    $beers = new \Beear\Models\content\Beers($data);
    $beers->updateBeer($data);

    require_once $this->viewAdmin('/beers/update-beer');
  }

  public function deleteBeer($data): void {
    $beers = new \Beear\Models\content\Beers($data);
    $beers->deleteBeer($data);

    require_once $this->viewAdmin('/beers/manage-beers');
  }
}