<?php

namespace Beear\Models\auth;

use Beear\Models\Manager;

class Users extends Manager { 
  // --------------- Requête pour enregister un user ---------------
  public function createUser(string $pseudo, string $mail, string $password, $id_roles = null): bool {
    $db = self::dbAccess();

    $req = $db->prepare(
      "INSERT INTO 
        users(
          pseudo, 
          mail,
          `password`,
          id_roles
        ) 
      VALUES (:pseudo, :mail, :password, :id_roles)"
    );

    return $req->execute([
      ':pseudo' => $pseudo,
      ':mail' => $mail,
      ':password' => password_hash($password, PASSWORD_DEFAULT),
      ':id_roles' => $id_roles
    ]);
  }

  // --------------- Requête pour se connecter ---------------
  public static function login(string $mail): mixed {
    $db = self::dbAccess();
    
    $req = $db->prepare("SELECT id, pseudo, mail, `password`, id_roles FROM users WHERE mail = :mail");
    $req->execute([':mail' => $mail]);

    return $req->fetch();
  }

  // --------------- Requête pour mettre à jour un mail d'un user ---------------
  public function updateMailUser(array $data): mixed {
    $db = self::dbAccess();

    $req = $db->prepare("UPDATE users SET mail = :mail WHERE id = :id");

    return $req->execute([
      ':mail' => $data['mail'],
      ':id' => $data['id']
    ]);
  }

  // --------------- Requête pour mettre à jour un password d'un user ---------------
  public function updatePasswordUser(array $data): mixed {
    $db = self::dbAccess();

    $req = $db->prepare(
      "UPDATE users SET `password` = :password WHERE id = :id"
    );

    return $req->execute([
      ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
      ':id' => $data['id']
    ]);
  }

  // --------------- Requête pour supprimer un user ---------------
  public function deleteUser(int $id): mixed {
    $db = self::dbAccess();

    $req = $db->prepare("DELETE FROM users WHERE id = :id");

    return $req->execute([':id' => $id]);
  }

  public static function getAllUsers() {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT pseudo, mail, `name`, created_at FROM users INNER JOIN `user-roles` ON `users`.id_roles = `user-roles`.id;");
    $req->execute();

    return $req->fetchAll();
  }
}