<?php

namespace Beear\Controllers\content;

use Beear\Controllers\Controller;

Class BeersController extends Controller {

	//show a beer by id in a view
	public function beerPage($data): void {
    $id = $data['id'];
    $beers = new \Beear\Models\content\BeersModel($id);
    $beer = $beers->getBeerById($id);

    include $this->viewFrontend('beer');
	}

  // show three last beers for the home page
  public function threeLastBeers($data): void {
    $id = $data['id'];
    $beers = new \Beear\Models\content\BeersModel($id);
    $threeLastBeers = $beers->getThreeLastBeers();

    include $this->viewFrontend('home');
  }

  //create a beer
  public function createBeer($data): void {
    $beers = new \Beear\Models\content\BeersModel($data);
    $beers->createBeer($data);

    $this->viewAdmin('/Beers');
  }

  //udpate a beer
  public function updateBeer($data): void {
    $beers = new \Beear\Models\content\BeersModel($data);
    $beers->updateBeer($data);

    $this->viewAdmin('/Beers');
  }

  //delete a beer
  public function deleteBeer($data): void {
    $beers = new \Beear\Models\content\BeersModel($data);
    $beers->deleteBeer($data);

    $this->viewAdmin('/Beers');
  }
}