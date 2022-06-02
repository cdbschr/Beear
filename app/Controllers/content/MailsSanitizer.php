<?php

namespace Beear\Controllers\content;

class MailsSanitizer {
  public function __construct(array $data) {
    $this->lastname = $data['lastname'];
    $this->firstname = $data['firstname'];
    $this->mail = $data['mail'];
    $this->phone = $data['phone'];
    $this->content = $data['content'];
  }

  // --------------- Satinization des informations reçues pour éviter les failles ---------------
  public function sanitizedDataContact(): array {
    return array(
      'lastname' => htmlspecialchars($this->lastname),
      'firstname' => htmlspecialchars($this->firstname),
      'mail' => htmlspecialchars($this->mail),
      'phone' => htmlspecialchars($this->phone),
      'content' => htmlspecialchars($this->content)
    );
  }
}