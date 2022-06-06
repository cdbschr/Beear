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
}
