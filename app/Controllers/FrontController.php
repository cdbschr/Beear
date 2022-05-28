<?php

namespace Beear\Controllers;

class FrontController extends Controller {
  function home(): void {
    require_once $this->viewFrontend('home');
  }

  function valeursPage(): void {
    require_once $this->viewFrontend('valeurs');
  }

  function actualitesPage(): void {
    require_once $this->viewFrontend('actualites');
  }

  function contactPage(): void {
    require_once $this->viewFrontend('/contact/contact');
  }

  function rgpdPage(): void {
    require_once $this->viewFrontend('rgpd');
  }

  function mentionsPage(): void {
    require_once $this->viewFrontend('mentionslegales');
  }

  // -------- Envoi dans la db les informations du formulaire de Contact --------
  function contactPost($data): void {

    $contact = new \Beear\Models\ContactsModel($data);

    if (filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
      $postMail = $contact::postMail($data);
      require_once $this->viewFrontend('/contact/contact-confirm');
    } else {
      header('Location:'.$this->viewFrontend('/contact/contact-error'));
    }
  }
}