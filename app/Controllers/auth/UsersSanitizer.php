<?php

namespace Beear\Controllers\auth;

class UsersSanitizer {
  private $data = [ ];

  public function __construct($data) {
    $this->lastname = $data['lastname'];
    $this->firstname = $data['firstname'];
    $this->mail = $data['mail'];
    $this->password = $data['password'];
  }

  public function sanitizedDataUser() {
    $data = [
      'lastname' => htmlspecialchars($this->lastname),
      'firstname' => htmlspecialchars($this->firstname),
      'mail' => htmlspecialchars($this->mail),
      'password' => htmlspecialchars($this->password)
    ];

    return $data;
  }


}