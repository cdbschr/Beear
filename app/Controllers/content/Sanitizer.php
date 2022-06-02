<?php

namespace Beear\Controllers\auth;

class Sanitizer {
  public function __construct(array $register) {
    $this->lastname = $register['lastname'];
    $this->firstname = $register['firstname'];
    $this->mail = $register['mail'];
    $this->password = $register['password'];
  }

  public function sanitizedRegister() {
    return $register = array(
      'lastname' => htmlspecialchars($this->lastname),
      'firstname' => htmlspecialchars($this->firstname),
      'mail' => htmlspecialchars($this->mail),
      'password' => htmlspecialchars($this->password)
    );
  }
}