<?php

namespace Project\Controllers;

class FrontController {
  function home() {
    require 'app/Views/frontend/home.php';
  }
  
  function valeursPage() {
    require 'app/Views/frontend/valeurs.php';
  }

  function actualitesPage() {
    require 'app/Views/frontend/actualites.php';
  }
  
  function contactPage() {
    require 'app/Views/frontend/contact/contact.php';
  }

  function contactPost($lastname, $firstname, $mail, $phone, $content) {
    $postMail = new \Project\Models\ContactModel();

    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mail = $postMail->postMail($lastname, $firstname, $mail, $phone, $content);
      require 'app/Views/frontend/contact/confirm-contact.php';
    } else {
      header('Location: app/Views/frontend/contact/error-contact.php');
    }
  }
}