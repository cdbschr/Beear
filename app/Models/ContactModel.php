<?php

namespace Project\Models;

class ContactModel extends Manager {
  private string $lastname;
  private string $firstname;
  private string $mail;
  private string $phone;
  private string $object;
  private string $content;

  public function __construct(array $data) {
    $this->lastname = $data['lastname'];
    $this->firstname = $data['firstname'];
    $this->mail = $data['mail'];
    $this->phone = $data['phone'];
    $this->object = $data['object'];
    $this->content = $data['content'];
  }

  public function postMail() {
    $db = self::dbAccess();

    $req = $db->prepare(
      'INSERT INTO 
        contacts(
          lastname, 
          firstname,  
          mail, 
          phone, 
          objet, 
          content
        ) 
      VALUE (:lastname, :firstname, :mail, :phone, `:object`, :content)'
    );

    $req->execute(array(
      ':lastname' => $this->lastname,
      ':firstname' => $this->firstname,
      ':mail' => $this->mail,
      ':phone' => $this->phone, 
      ':object' => $this->object, 
      ':content' => $this->content
    ));
    return $req;
  }
}