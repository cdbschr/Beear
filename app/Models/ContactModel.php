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

  public function postMail(string $lastname, string $firstname, string $mail, string $phone, string $object, string $content) {
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
      ':lastname' => $lastname,
      ':firstname' => $firstname,
      ':mail' => $mail,
      ':phone' => $phone, 
      ':object' => $object, 
      ':content' => $content
    ));
    return $req;
  }

  public function getMails() {
    $db = self::dbAccess();
    
    $req = $db->query('SELECT id, lastname, firstname, mail, phone, `object`, content FROM contacts ORDER BY id DESC');
    return $req;
  }

  public function deleteMail($id) {
    $db = self::dbAccess();

    $req = $db->prepare('DELETE FROM contacts WHERE id = :id');
    $req->execute(array(':id' => $id));
    return $req;
  }
}