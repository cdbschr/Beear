<?php

namespace Beear\Controllers\content;

use Beear\Controllers\Controller;

Class Beers extends Controller {
  // ----------- Affichage de la page de bière par rapport à l'id -----------
  public function beerPage($id): void {
    $beer = \Beear\Models\content\Beers::getBeerById($id);

    require_once $this->viewFrontend('content/beer-page');
  }
  
  // ----------- Permet de mettre à jour la bière par rapport à l'id -----------
  public function updateBeer($data, $id): void {
    $req = new \Beear\Models\content\Beers();
    $req->updateBeer($data, $id);

    header('Location:dashboard.php?action=beers');
  }

  // ----------- Permet de supprimer la bière par rapport à l'id -----------
  public function deleteBeer($id): void {
    $beer = new \Beear\Models\content\Beers();
    $beer->deleteBeer($id);
    
    header('Location:/dashboard.php?action=beers');
  }
}