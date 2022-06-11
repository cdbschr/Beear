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

  public function createBeer($dataBeer) {
    $req = new \Beear\Models\content\Beers();
    $req->createBeer($dataBeer);

    header('Location:dashboard.php?action=beers');
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
    require_once $this->viewAdmin('/beers/update-beer');
  }

  public function deleteBeer($id): void {
    $beer = new \Beear\Models\content\Beers();
    $beer->deleteBeer($id);
    
    header('Location:/dashboard.php?action=beers');
  }
}