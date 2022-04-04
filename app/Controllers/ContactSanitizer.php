<?php 

class ContactSanitizer {
  protected $data = [];

  public function __construct($data) {
      $this->firstname = $data['firstname'];
      $this->lastname = $data['lastname'];
      $this->mail = $data['mail'];
      $this->phone = $data['phone'];
      $this->content = $data['content'];
  }

  public function sanitize() {
    
    $data = [
        'firstname' => htmlspecialchars($this->firstname),
        'lastname' => htmlspecialchars($this->lastname),
        'mail' => htmlspecialchars($this->mail),
        'phone' => htmlspecialchars($this->phone),
        'content' => htmlspecialchars($this->content),
    ];
    
    return $data;
  }
}