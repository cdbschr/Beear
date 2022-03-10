<?php

namespace Project\Models;

use Exception;

class Manager {
  protected static function dbAccess() {
    $dbConnection = "mysql:dbname=". $_ENV['DB_NAME'] ."; host=". $_ENV['DB_HOST'] .":". $_ENV['DB_PORT'] ."; charset=utf8";
    $user = $_ENV['DB_USERNAME'];
    $pwd = $_ENV['DB_PASSWORD'];

    try {
      $db = new \PDO($dbConnection, $user, $pwd);
      return $db;

    } catch (Exception $e) {
        require './app/Views/errors/404.php';
    }
  }
}