<?php 

namespace Beear\Models\content;

use Beear\Models\Manager;

class Beers extends Manager {
  protected int $id;
  protected string $idname;
  protected string $name;
  protected string $hook;
  protected int $alcdegree;
  protected string $desc;
  protected int $ibu;
  protected string $temp;
  protected string $voyez;
  protected string $sentez;
  protected string $goutez;
  protected string $img;

  public function __construct(array $data) {
    $this->id = $data['id'];
    $this->idname = $data['idname'];
    $this->name = $data['name'];
    $this->hook = $data['hook'];
    $this->alcdegree = $data['alcdegree'];
    $this->desc = $data['desc'];
    $this->ibu = $data['ibu'];
    $this->temp = $data['temp'];
    $this->voyez = $data['voyez'];
    $this->sentez = $data['sentez'];
    $this->goutez = $data['goutez'];
    $this->img = $data['img'];
  }

  //get beer by id
  public function getBeerById(int $id): mixed {
    $db = self::dbAccess();
    
    $req = $db->prepare("SELECT * FROM beers WHERE id = :id");
    $req->execute(array(':id' => $id));
    $beer = $req->fetch();
    return $beer;
  }

  //get three last beers added
  public static function getThreeLastBeers(): mixed {
    $db = self::dbAccess();

    $req = $db->prepare("SELECT * FROM beers ORDER BY id DESC LIMIT 3");
    $req->execute();
    return $req->fetch();
  }

  //create a beer
  public static function createBeer(array $createBeer): void {
    $db = self::dbAccess();

    $req = $db->prepare("INSERT INTO beers (idname, name, hook, alcdegree, desc, ibu, temp, voyez, sentez, goutez, img) VALUES (:idname, :name, :hook, :alcdegree, :desc, :ibu, :temp, :voyez, :sentez, :goutez, :img)");
    $req->execute([
      ':idname' => $createBeer['idname'],
      ':name' => $createBeer['name'],
      ':hook' => $createBeer['hook'],
      ':alcdegree' => $createBeer['alcdegree'],
      ':desc' => $createBeer['desc'],
      ':ibu' => $createBeer['ibu'],
      ':temp' => $createBeer['temp'],
      ':voyez' => $createBeer['voyez'],
      ':sentez' => $createBeer['sentez'],
      ':goutez' => $createBeer['goutez'],
      ':img' => $createBeer['img']
    ]);
  }

  //update a beer
  public static function updateBeer(array $data): void {
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

  //delete a beer
  public static function deleteBeer(int $id): void {
    $db = self::dbAccess();

    $req = $db->prepare("DELETE FROM beers WHERE id = :id");
    $req->execute([
      ':id' => $id
    ]);
  }
}