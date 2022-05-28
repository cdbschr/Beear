<?php

namespace Beear\Controllers;

class FrontController extends Controller {
  function home(): void {
    include $this->viewFrontend('home');
  }

  function valeursPage(): void {
    include $this->viewFrontend('valeurs');
  }

  function actualitesPage(): void {
    include $this->viewFrontend('actualites');
  }

  function contactPage(): void {
    include $this->viewFrontend('/contact/contact');
  }

  function rgpdPage(): void {
    include $this->viewFrontend('rgpd');
  }

  function mentionsPage(): void {
    include $this->viewFrontend('mentionslegales');
  }

  // -------- Envoi dans la db les informations du formulaire de Contact --------
  function contactPost($data): void {

    $contact = new \Beear\Models\ContactsModel($data);

    if (filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
      $postMail = $contact::postMail($data);
      require $this->viewFrontend('/contact/contact-confirm');
    } else {
      header('Location:'.$this->viewFrontend('/contact/contact-error'));
    }
  }
}