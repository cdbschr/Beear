<?php 

namespace Beear\Models\content;

use Beear\Models\Manager;

class Beers extends Manager {
  // --------------- Requête pour afficher toutes les bières ---------------
  public function getAllBeers(): mixed {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT id, `name`, idname, DATE_FORMAT(created_at, '%d/%m/%Y') as created_date, DATE_FORMAT(modified_at, '%d/%m/%Y') AS modified_date FROM beers");
    $req->execute();
    return $req->fetchAll();
  }
  
  
  // --------------- Requête pour afficher une bière par son id ---------------
  public function getBeerById(int $id): array {
    $db = self::dbAccess();
    
    $req = $db->prepare("SELECT * FROM beers WHERE id = :id");
    $req->execute(array(':id' => $id));
    $beer = $req->fetch();
    return $beer;
  }

  // --------------- Requête pour afficher les 3 dernières bières ---------------
  public function getThreeFirstBeers(): mixed {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT * FROM beers ORDER BY id ASC LIMIT 3");
    $req->execute();
    return $req->fetch();
  }

  // --------------- Requête pour créer une bière ---------------
    public static function createBeer(array $dataBeer): void {
    $db = self::dbAccess();

    $req = $db->prepare("INSERT INTO beers (idname, `name`, hook, alcdegree, `desc`, ibu, temp, voyez, sentez, goutez, img) VALUES (:idname, :name, :hook, :alcdegree, :desc, :ibu, :temp, :voyez, :sentez, :goutez, :img)");
    $req->execute([
      ':idname' => $dataBeer['idname'],
      ':name' => $dataBeer['name'],
      ':hook' => $dataBeer['hook'],
      ':alcdegree' => $dataBeer['alcdegree'],
      ':desc' => $dataBeer['desc'],
      ':ibu' => $dataBeer['ibu'],
      ':temp' => $dataBeer['temp'],
      ':voyez' => $dataBeer['voyez'],
      ':sentez' => $dataBeer['sentez'],
      ':goutez' => $dataBeer['goutez'],
      ':img' => $dataBeer['img']
    ]);
  }

  // --------------- Requête pour mettre à jour une bière par son id ---------------
  public function updateBeer(array $data): void {
    $db = self::dbAccess();

    $req = $db->prepare("UPDATE beers SET idname = :idname, name = :name, hook = :hook, alcdegree = :alcdegree, desc = :desc, ibu = :ibu, temp = :temp, voyez = :voyez, sentez = :sentez, goutez = :goutez, img = :img WHERE id = :id");
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
      ':img' => $data['img'],
      ':id' => $data['id']
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
}