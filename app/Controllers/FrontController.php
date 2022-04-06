<?php

namespace Project\Controllers;

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

  function contactPost(array $formContactData) {
    if(filter_var($formContactData['mail'], FILTER_VALIDATE_EMAIL)) {
      $postMail = new \Project\Models\ContactModel($formContactData);
      include $this->viewFrontend('/contact/contact-confirm');
    } else {
      header('Location: app/Views/frontend/contact/error.php');
    }
  }

  function inscriptionPage(): void {
    include $this->viewFrontend('');
  }

  function connexionPage(): void {
    require 'app/Views/frontend/auth/login.php';
  }
}