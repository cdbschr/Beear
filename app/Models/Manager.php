<?php

namespace Project\Models;

use Exception;

class Manager {
  
  private static $db = null;
  
  protected static function dbAccess() {
    $dbConnection = "mysql:dbname=". $_ENV['DB_NAME'] ."; host=". $_ENV['DB_HOST'] .":". $_ENV['DB_PORT'] ."; charset=utf8";
    $user = $_ENV['DB_USERNAME'];
    $pwd = $_ENV['DB_PASSWORD'];

    if(isset(self::$db)) {
      return self::$db;
    } else { 
      
      try {
      self::$db = new \PDO($dbConnection, $user, $pwd);
      return self::$db;

      } catch (Exception $e) {
        require './app/Views/errors/404.php';
      }
    }
  }

  //Mise en place d'un mini ORM, avec * pour récupération plus générale
  public static function all() {
    $objects = [];

    $child = get_called_class();

    $req = 'SELECT * FROM `{$child}`';

    foreach (self::dbAccess()->query($req) as $data) {
      array_push($objects, new $child($data));
    }
    return $objects;
  }

  public static function find($id) {
    $child = get_called_class();

    $req = self::dbAccess()->prepare('SELECT * FROM `{$child}` WHERE id = :id');
    $req->execute(array(':id' => $id));

    return new $child($req->fetch());
  }
}