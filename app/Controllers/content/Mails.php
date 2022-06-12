<?php

namespace Beear\Controllers\content;

use Beear\Controllers\Controller;

Class Mails extends Controller {
  // -------- Envoi dans la db les informations du formulaire de Contact --------
  function contactPost(array $data): void {

    $contact = new \Beear\Models\content\Mails($data);

    if (filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
      $postMail = $contact::postMail($data);
      require_once $this->viewFrontend('/contact/contact-confirm');
    } else {
      header('Location:'.$this->viewFrontend('/contact/contact-error'));
    }
  }

  function deleteMail(int $id): void {
    $mail = \Beear\Models\content\Mails::deleteMail($id);

    header('Location:dashboard.php?action=mails');
  }
}