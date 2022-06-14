<?php

namespace Beear\Controllers;

use Beear\Controllers\content\Beers;

class FrontController extends Controller {
  // -------- Page principale --------
  public function home(): void {
    $object = new \Beear\Models\content\Beers();
    $beers = $object->getThreeFirstBeers();

    require_once $this->viewFrontend('home');
  }

  // -------- Page valeur --------
  public function valeursPage(): void {
    require_once $this->viewFrontend('valeurs');
  }

  // -------- Page contact --------
  public function contactPage(): void {
    require_once $this->viewFrontend('/contact/contact');
  }

  // -------- Page rgpd --------
  public function rgpdPage(): void {
    require_once $this->viewFrontend('legals/rgpd');
  }

  // -------- Page mentions légales --------
  public function mentionsPage(): void {
    require_once $this->viewFrontend('legals/mentionslegales');
  }

  // -------- Page plan du site --------
  public function planSitePage(): void {
    require_once $this->viewFrontend('plandusite');
  }
}