<?php

namespace Project\Controllers;

class ContactController {
  function contactPost($lastname, $firstname, $mail, $phone, $object, $content): void {
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