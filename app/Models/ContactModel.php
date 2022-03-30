<?php

namespace Project\Models;

class ContactModel extends Manager {
  protected string $lastname;
  protected string $firstname;
  protected string $mail;
  protected string $phone;
  protected string $object;
  protected string $content;

  public function __construct($data) {
    $this->lastname = $data['lastname'];
    $this->firstname = $data['firstname'];
    $this->mail = $data['mail'];
    $this->phone = $data['phone'];
    $this->object = $data['object'];
    $this->content = $data['content'];
  }

  public static function postMail($formContactData): void {
    $db = self::dbAccess();

    $req = $db->prepare(
      'INSERT INTO 
        contacts(
          lastname, 
          firstname,  
          mail, 
          phone, 
          `object`, 
          content
        ) 
      VALUE (:lastname, :firstname, :mail, :phone, `:object`, :content)'
    );

    $req->execute(
      array(
      ':lastname' => $formContactData['lastname'],
      ':firstname' => $formContactData['firstname'],
      ':mail' => $formContactData['mail'],
      ':phone' => $formContactData['phone'],
      ':object' => $formContactData['object'],
      ':content' => $formContactData['content']
    ));
  }

  public function getMails(): array {
    $db = self::dbAccess();

    $req = $db->query('SELECT id, lastname, firstname, mail, phone, `object`, content FROM contacts ORDER BY id DESC');
    return $req;
  }

  public function deleteMail($id): void {
    $db = self::dbAccess();

    $req = $db->prepare('DELETE FROM contacts WHERE id = :id');
    $req->execute(array(':id' => $id));
  }
}
