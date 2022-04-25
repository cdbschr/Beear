<?php

namespace Beear\Controllers\content;

use Beear\Controllers\Controller;

Class ActusController extends Controller {
  
  // -------- Affiche une actualité --------
  public function showSingleActu($data) {
    $id = $data['id'];
    $actu = new \Beear\Models\content\ActusModel($id);
    $actu = $actu::getActu($id);

    return $this->viewFrontend('actu');
  }
  
  // -------- Affiche toutes les actualités --------
  public function showAllActus() {
    $actualites = \Beear\Models\content\ActusModel::getAllActus();

    return $this->viewFrontend('actualites');
  }

  // -------- Création d'une actualité --------
  public function createActu($data) {
    $actus = new \Beear\Models\content\ActusModel($data);
    $actus = $actus->sanitizedData();

    $actus = \Beear\Models\content\ActusModel::createActu($actus);

    return $this->viewFrontend('actualites');
  }

  // -------- Modification d'une actualité --------
  public function updateActu($data) {
    $actus = new \Beear\Models\content\ActusModel($data);
    $actus = $actus->sanitizedData();

    $actus = \Beear\Models\content\ActusModel::updateActu($actus);

    return $this->viewFrontend('actualites');
  }

  // -------- Suppression d'une actualité --------
  public function deleteActu($data) {
    $actus = new \Beear\Models\content\ActusModel($data);
    $actus = $actus->sanitizedData();

    $actus = \Beear\Models\content\ActusModel::deleteActu($actus);

    return $this->viewFrontend('actualites');
  }
}