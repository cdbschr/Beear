<?php

namespace Beear\Models;

class UsersModel extends Manager { 
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
      VALUES (:lastname, :firstname, :mail, :`password`)'
    );

    return $req->execute([
      ':lastname' => $data['lastname'],
      ':firstname' => $data['firstname'],
      ':mail' => $data['mail'],
      ':`password`' => password_hash($data['password'], PASSWORD_DEFAULT)
    ]);
  }

  public static function userExist($mail) {
    $db = self::dbAccess();

    $req = $db->prepare('SELECT * FROM users WHERE mail = :mail');
    $req->execute(array(':mail' => $mail));

    return $req->fetch();
  }

  public static function login($mail, $password) {
    $db = self::dbAccess();

    $req = $db->prepare('SELECT * FROM users WHERE mail = :mail');
    $req->execute(array(':mail' => $mail));

    $user = $req->fetch();

    if ($user && password_verify($password, $user['password'])) {
      return $user;
    }

    return false;
  }
}
