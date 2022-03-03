<?php

namespace Project\Models;

class ContactModel extends Manager {
  public function postMail($lastname, $firstname, $mail, $phone, $content) {
    $db = $this->dbAccess();
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
      VALUE (?, ?, ?, ?, ?, ?)'
    );
    $req->execute(array($lastname, $firstname, $mail, $phone, $content));
    return $req;
  }
}