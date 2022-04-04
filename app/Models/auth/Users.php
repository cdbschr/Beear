<?php 

namespace Project\Models;

class Users extends Manager {
  protected $id;
  protected $lastname;
  protected $firstname;
  protected $mail;

  public function __construct(array $data) {
    $this->id = $data['id'];
    $this->lastname = $data['lastname'];
    $this->firstname = $data['firstname'];
    $this->mail = $data['mail'];
  }

  public static function register(array $data) {
    $db = self::dbAccess();

    $req = $db->prepare(
      'INSERT INTO 
        users(
          lastname, 
          firstname,  
          mail,
          `password`
        ) 
      VALUE (:lastname, :firstname, :mail, :`password`)'
    );
  }
}