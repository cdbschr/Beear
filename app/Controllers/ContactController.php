<?php

namespace Project\Controllers;

class ContactController {
  function contactPost(): void {
    $data = [];
    $postMail = new \Project\Models\ContactModel($data);

    if (filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
      $mail = $postMail->postMail();
      require 'app/Views/frontend/contact/confirm-contact.php';
    } else {
      header('Location: app/Views/frontend/contact/error-contact.php');
    }
  }
}