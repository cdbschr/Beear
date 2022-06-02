<?php

namespace Beear\Controllers\content;

class BeersSanitizer {
  public function __construct(array $beers) {
    $this->lastname = $beers['lastname'];
    $this->firstname = $beers['firstname'];
    $this->mail = $beers['mail'];
    $this->password = $beers['password'];
  }

  public function sanitizedRegister() {
    return array(
      'lastname' => htmlspecialchars($this->lastname),
      'firstname' => htmlspecialchars($this->firstname),
      'mail' => htmlspecialchars($this->mail),
      'password' => htmlspecialchars($this->password)
    );
  }
}