<?php

namespace Project\Models;

class ContactModel extends Manager {
  protected int $id;
  protected string $lastname;
  protected string $firstname;
  protected string $mail;
  protected string $phone;
  protected string $content;

  public function __construct(array $data) {
    $this->lastname = $data['lastname'] ?? '';
    $this->firstname = $data['firstname'] ?? '';
    $this->mail = $data['mail'] ?? '';
    $this->phone = $data['phone'] ?? '';
    $this->content = $data['content'] ?? '';
  }

  // --------------- Requête pour enregistrer le formulaire de contact dans la base de données ---------------
  public static function postMail(array $formContactData) {
    $db = self::dbAccess();

    $req = $db->prepare(
      'INSERT INTO 
        contacts(
          lastname, 
          firstname,  
          mail, 
          phone, 
          content,
        ) 
      VALUES (:lastname, :firstname, :mail, :phone, :content)'
    );

     return $req->execute(
      array(
      ':lastname' => $formContactData['lastname'],
      ':firstname' => $formContactData['firstname'],
      ':mail' => $formContactData['mail'],
      ':phone' => $formContactData['phone'],
      ':content' => $formContactData['content']
    ));
  }
}