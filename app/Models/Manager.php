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

class Beears {
  private function getBeer() {
    private string $id;
    private string $name;
    private string $secName;
    private int $alcDegree;
    private string $desc;
    private int $ibu;
    private string $temp;
    private string $voyez;
    private string $sentez;
    private string $goutez;

  public function __construct(array $data) {
    $this->id = $id;
    $this->name = $name;
    $this->secName = $secName;
    $this->alcDegree = $alcDegree;
    $this->desc = $desc;
    $this->ibu = $ibu;
    $this->temp = $temp;
    $this->voyez = $voyez;
    $this->sentez = $sentez;
    $this->goutez = $goutez;
  }}
}