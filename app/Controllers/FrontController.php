<?php

namespace Beear\Controllers;

class FrontController extends Controller {
  // -------- Page principale --------
  function home(): void {
    require_once $this->viewFrontend('home');
  }

  // -------- Page valeur --------
  function valeursPage(): void {
    require_once $this->viewFrontend('valeurs');
  }

  // -------- Page contact --------
  function contactPage(): void {
    require_once $this->viewFrontend('/contact/contact');
  }

  // -------- Page rgpd --------
  function rgpdPage(): void {
    require_once $this->viewFrontend('rgpd');
  }

  // -------- Page mentions légales --------
  function mentionsPage(): void {
    require_once $this->viewFrontend('mentionslegales');
  }

  // -------- Envoi dans la db les informations du formulaire de Contact --------
  
}