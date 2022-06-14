<?php

namespace Beear\Models\auth;

use Beear\Models\Manager;

class Users extends Manager { 
  // --------------- Requête pour enregister un user ---------------
  public function createUser(string $pseudo, string $mail, string $password, $id_roles = null): void {
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

    $req->execute([
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

  
  // --------------- Requête pour mettre à jour un user ---------------
  public function updateUser($pseudo, $mail, $id): void {
    $db = self::dbAccess();

    $req = $db->prepare(
      "UPDATE users SET 
        pseudo = :pseudo,
        mail = :mail
      WHERE id = :id"
    );

    $req->execute([
      ':pseudo' => $pseudo,
      ':mail' => $mail,
      ':id' => $id
    ]);
  }

  // --------------- Requête pour supprimer un user ---------------
  public function deleteUser($id): void {
    $db = self::dbAccess();

    $req = $db->prepare("DELETE FROM users WHERE id = :id");
    $req->execute([':id' => $id]);
  }

  // --------------- Requête pour récupérer tous les users ---------------
  public function getAllUsers(): array {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT id, pseudo, mail, DATE_FORMAT(created_at,'%d/%m/%Y %H:%i') AS `date`, `name` FROM users INNER JOIN `user-roles` ON `users`.id_roles = `user-roles`.id_role;");
    $req->execute();

    return $req->fetchAll();
  }

  // --------------- Requête pour récupérer un user par rapport à son id ---------------
  public static function getUserById($id): array {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT * FROM users WHERE id = :id");
    $req->execute([':id' => $id]);

    return $req->fetch();
  }

  // --------------- Requête pour savoir le nombre d'utilisateurs ---------------
  public static function countUsers(): array {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT COUNT(id) AS nb FROM users");
    $req->execute();

    return $req->fetch();
  }
}