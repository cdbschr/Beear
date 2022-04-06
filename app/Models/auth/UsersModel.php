<?php 

namespace Project\Models;

class Users extends Manager {
  protected $id;
  protected $lastname;
  protected $firstname;
  protected $mail;

  public function __construct(array $data) {
    $this->id = $data['id'] ?? '';
    $this->lastname = $data['lastname'] ?? '';
    $this->firstname = $data['firstname'] ?? '';
    $this->mail = $data['mail'] ?? '';
  }
  
  // --------------- Requête pour enregister un user ---------------
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
      VALUES (:lastname, :firstname, :mail, :`password`)');

      return $req->execute([
        ':lastname' => $data['lastname'],
        ':firstname' => $data['firstname'],
        ':mail' => $data['mail'],
        ':`password`' => password_hash($data['password'], PASSWORD_DEFAULT)
      ]);
  }
}