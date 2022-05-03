<?php

namespace Beear\Controllers\content;

use Beear\Controllers\Controller;

Class BeersController extends Controller {

	//affiche une bière dans une page unique en récupérant son id
	public function beerPage($data): void {
    $id = $data['id'];
    $beers = new \Beear\Models\content\BeersModel($id);
    $beer = $beers::getBeerById($id);

    include $this->viewFrontend('/beers/beer');
	}
}