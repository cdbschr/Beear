<?php

namespace Beear\Models\auth;

use Beear\Models\Manager;

class UsersModel extends Manager { 
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

  // --------------- Requête pour enregister un user ---------------
  public static function register(array $data): mixed {
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

  public static function isUserExist($mail): mixed {
    $db = self::dbAccess();

    $req = $db->prepare('SELECT * FROM users WHERE mail = :mail');
    $req->execute(array(':mail' => $mail));

    return $req->fetch();
  }

  // --------------- Requête pour se connecter ---------------
  public static function login(array $dataUser): mixed {
    $db = self::dbAccess();

    $req = $db->prepare('SELECT * FROM users WHERE mail = :mail');
    $req->execute(array(':mail' => $dataUser['mail']));

    $user = $req->fetch();

    if ($user && password_verify($dataUser['password'], $user['password'])) {
      return $user;
    }

    return false;
  }
  
  // --------------- Sanitizer ---------------
  public static function sanitizedDataUser(): array {
    return array (
      'lastname' => htmlspecialchars($_POST['lastname']),
      'firstname' => htmlspecialchars($_POST['firstname']),
      'mail' => htmlspecialchars($_POST['mail']),
      'password' => htmlspecialchars($_POST['password'])
    );
  }
}