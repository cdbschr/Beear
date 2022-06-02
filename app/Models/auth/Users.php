<?php

namespace Beear\Models\auth;

use Beear\Models\Manager;

class Users extends Manager { 
  
  
  protected $id;
  protected $lastname;
  protected $firstname;
  protected $mail;
  protected $password;

  public function __construct(array $data) {
    $this->id = $data['id'];
    $this->lastname = $data['lastname'];
    $this->firstname = $data['firstname'];
    $this->mail = $data['mail'];
    $this->password = $data['password'];
  }

  // --------------- Requête pour enregister un user ---------------
  public static function createUser(array $register): mixed {
    $db = self::dbAccess();

    $req = $db->prepare(
      "INSERT INTO 
        users(
          lastname, 
          firstname,  
          mail,
          password
        ) 
      VALUES (:lastname, :firstname, :mail, :password)"
    );

    return $req->execute([
      ':lastname' => $register['lastname'],
      ':firstname' => $register['firstname'],
      ':mail' => $register['mail'],
      ':password' => password_hash($register['password'], PASSWORD_DEFAULT)
    ]);
  }

  public static function isUserExist($mail): mixed {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT * FROM users WHERE mail = :mail");
    $req->execute(array(':mail' => $mail));

    return $req->fetch();
  }

  // --------------- Requête pour se connecter ---------------
  public static function login(array $dataUser): mixed {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT * FROM users WHERE mail = :mail");
    $req->execute(array(':mail' => $dataUser['mail']));

    $user = $req->fetch();

    if ($user && password_verify($dataUser['password'], $user['password'])) {
      return $user;
    }

    return false;
  }

  public static function updateMailUser(array $data): mixed {
    $db = self::dbAccess();

    $req = $db->prepare(
      "UPDATE users SET mail = :mail WHERE id = :id"
    );

    return $req->execute([
      ':mail' => $data['mail'],
      ':id' => $data['id']
    ]);
  }

  public static function updatePasswordUser(array $data): mixed {
    $db = self::dbAccess();

    $req = $db->prepare(
      "UPDATE users SET `password` = :password WHERE id = :id"
    );

    return $req->execute([
      ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
      ':id' => $data['id']
    ]);
  }
}