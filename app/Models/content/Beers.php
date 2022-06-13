<?php 

namespace Beear\Models\content;

use Beear\Models\Manager;

class Beers extends Manager {
  // --------------- Requête pour mettre à jour une bière par son id ---------------
  public function updateBeer(array $data, int $id): void {
    $db = self::dbAccess();

    $req = $db->prepare("UPDATE beers SET idname = :idname, `name` = :name, hook = :hook, alcdegree = :alcdegree, `desc` = :desc, ibu = :ibu, temp = :temp, voyez = :voyez, sentez = :sentez, goutez = :goutez WHERE id = :id");
    $req->execute([
      ':idname' => $data['idname'],
      ':name' => $data['name'],
      ':hook' => $data['hook'],
      ':alcdegree' => $data['alcdegree'],
      ':desc' => $data['desc'],
      ':ibu' => $data['ibu'],
      ':temp' => $data['temp'],
      ':voyez' => $data['voyez'],
      ':sentez' => $data['sentez'],
      ':goutez' => $data['goutez'],
      ':id' => $id
    ]);
  }

  // --------------- Requête pour supprimer une bière par son id ---------------
  public function deleteBeer(int $id): void {
    $db = self::dbAccess();

    $req = $db->prepare("DELETE FROM beers WHERE id = :id");
    $req->execute([
      ':id' => $id
    ]);
  }
  
  // --------------- Requête pour afficher toutes les bières ---------------
  public function getAllBeers(): mixed {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT id, `name`, idname, DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') as created_date, DATE_FORMAT(modified_at, '%d/%m/%Y %H:%i') AS modified_date FROM beers");
    $req->execute();
    return $req->fetchAll();
  }
  
  
  // --------------- Requête pour afficher une bière par son id ---------------
  public static function getBeerById(int $id): array {
    $db = self::dbAccess();
    
    $req = $db->prepare("SELECT * FROM beers WHERE id = :id");
    $req->execute(array(':id' => $id));
    return $req->fetch();
  }

  // --------------- Requête pour afficher les 3 dernières bières ---------------
  public function getThreeFirstBeers(): mixed {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT * FROM beers ORDER BY id ASC LIMIT 3");
    $req->execute();
    return $req->fetchAll();
  }
}