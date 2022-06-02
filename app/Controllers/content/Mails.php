<?php

namespace Beear\Controllers\content;

use Beear\Controllers\Controller;

Class Mails extends Controller {
  function contactPost($data): void {

    $contact = new \Beear\Models\Mails($data);

    if (filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
      $postMail = $contact::postMail($data);
      require_once $this->viewFrontend('/contact/contact-confirm');
    } else {
      header('Location:'.$this->viewFrontend('/contact/contact-error'));
    }
  }
}