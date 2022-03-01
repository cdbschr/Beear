<?php

namespace Project\Models;

use Exception;

class Manager {
  protected function dbConnect() {
    try {
      $bdd = new \PDO('mysql:host=localhost;dbname=architecturemvc;charset=utf8','root','');
      return $bdd;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getmessage());
    }
  }
}