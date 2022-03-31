<?php

namespace Project\Controllers;

class ContactController {
  function contactPost(array $formContactData) {
    $data = [];
    
    if(filter_var($formContactData['mail'], FILTER_VALIDATE_EMAIL)) {
      $postMail = \Project\Models\ContactModel::postMail($formContactData);
      require 'app/Views/frontend/contact/contact-confirm.php';
    } else {
      header('Location: app/Views/frontend/contact/error.php');
    }
  }
}