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

  public function verifyExtension($fileName) {
    $name = $fileName;
    $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $extensionAllowed = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($extension, $extensionAllowed)) {
      return true;
    } else {
      return false;
    }
  }

  public function updateBeer($id): void {
    $idBeer = \Beear\Models\content\Beers::findBy('id', $id);

    $idBeer->updateBeer($id);

    require_once $this->viewAdmin('/beers/update-beer');
  }

  public function deleteBeer($id): void {
    $beers = \Beear\Models\content\Beers::findBy('id', $id);
    $beers->deleteBeer($id);

    require_once $this->viewAdmin('/beers/manage-beers');
  }
}