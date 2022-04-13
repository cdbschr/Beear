<?php

namespace Beear\Models;

class ContactsModel extends Manager {
  protected int $id;
  protected string $lastname;
  protected string $firstname;
  protected string $mail;
  protected string $phone;
  protected string $content;

  public function __construct(array $data) {
    $this->lastname = $data['lastname'];
    $this->firstname = $data['firstname'];
    $this->mail = $data['mail'];
    $this->phone = $data['phone'];
    $this->content = $data['content'];
  }

  // --------------- Requête pour enregistrer le formulaire de contact dans la base de données ---------------
  public static function postMail($formContactData) {
    $db = self::dbAccess();
    // var_dump($formContactData);die;

    $req = $db->prepare(
      'INSERT INTO 
        contact(
          lastname, 
          firstname,  
          mail, 
          phone, 
          content
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
      )
    );
  }

  // --------------- Satinization des informations reçues pour éviter les failles ---------------
  public function sanitizedDataContact() {
    return array(
      'lastname' => htmlspecialchars($this->lastname),
      'firstname' => htmlspecialchars($this->firstname),
      'mail' => htmlspecialchars($this->mail),
      'phone' => htmlspecialchars($this->phone),
      'content' => htmlspecialchars($this->content)
    );
  }
}