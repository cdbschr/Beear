<?php

namespace Beear\Models;

use Exception;

abstract class Manager {
  /* ----------------------------------------------------------------
    ---------------- Connexion à la base de données -----------------
    ---------------------------------------------------------------- */
  private static $db = null;

  protected static function dbAccess() {
    $path = "mysql:dbname=" . $_ENV['DB_NAME'] . "; host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . "; charset=utf8";
    $user = $_ENV['DB_USERNAME'];
    $pwd = $_ENV['DB_PASSWORD'];

    if (isset(self::$db)) {
      return self::$db;
    } else {
      self::$db = new \PDO($path, $user, $pwd);
      self::$db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
      
      return self::$db;
    }
  }

  public static function closeConnection() {
    self::$db = null;
  }

  /* ----------------------------------------------------------------
    ------------------ Mise en place d'un mini-ORM ------------------
    ---------------------------------------------------------------- */

  public static function all(): array {
    $objects = [];

    $child = get_called_class();
    $child = strtolower($child);

    $req = 'SELECT * FROM `{$child}`';

    foreach (self::dbAccess()->prepare($req) as $data) {
      $data->execute(array_push($objects, new $child($data)));
    }
    return $objects;
  }

  // --------------- Requête pour afficher toute les données d'une colonne d'une table basé sur un élément d'une colonne ---------------
  public static function findBy($column, $value): object {
    $child = get_called_class();
    $child = strtolower($child);

    $req = self::dbAccess()->prepare('SELECT * FROM `{$child}` WHERE `{$column}` = :value');
    $req->execute(array(':value' => $value));

    return new $child($req->fetch());
  }

  // --------------- Requête pour mettre à jour les données d'une colonne dans une table basé sur un élément d'une colonne  ---------------
  public static function updateBy($column, $value): object {
    $child = get_called_class();
    $child = strtolower($child);

    $req = self::dbAccess()->prepare('UPDATE `{$child}` SET `{$column}` = :value WHERE `{$column}` = :value');
    $req->execute(array(':value' => $value));

    return new $child($req->fetch());
  }

  // --------------- Requête pour supprimer les données d'une colonne dans une table basé sur un élément d'une colonne ---------------
  public static function deleteBy($column, $value): object {
    $child = get_called_class();
    $child = strtolower($child);

    $req = self::dbAccess()->prepare('DELETE FROM `{$child}` WHERE `{$column}` = :value');
    $req->execute(array(':value' => $value));

    return new $child($req->fetch());
  }
}
