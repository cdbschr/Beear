<?php

namespace Project\Controllers;

class FrontController {
  function home(): void {
    require 'app/Views/frontend/home.php';
  }
  
  function valeursPage(): void {
    require 'app/Views/frontend/valeurs.php';
  }

  function actualitesPage(): void {
    require 'app/Views/frontend/actualites.php';
  }
  
  function contactPage(): void {
    require 'app/Views/frontend/contact/contact.php';
  }

  function contactPost($lastname, $firstname, $mail, $phone, $object, $content) {
    $data = [];
    $postMail = new \Project\Models\ContactModel($data);

    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mail = $postMail->postMail($lastname, $firstname, $mail, $phone, $object, $content);
      require 'app/Views/frontend/contact/contact-confirm.php';
    } else {
      header('Location: app/Views/frontend/contact/error.php');
    }
  }
}