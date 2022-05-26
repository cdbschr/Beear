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
    
    $req = $db->prepare('SELECT * FROM beers WHERE id = ?');
    $req->execute(array($id));
    $beer = $req->fetch();
    return $beer;
  }

  //get three last beers added
  public static function getThreeLastBeers(): mixed {
    $db = self::dbAccess();

    $req = $db->prepare('SELECT * FROM beers ORDER BY id DESC LIMIT 3');
    $req->execute();
    return $req->fetch();
  }

  //create a beer
  public static function createBeer(array $data): void {
    $db = self::dbAccess();

    $req = $db->prepare('INSERT INTO beers (idname, name, hook, alcdegree, desc, ibu, temp, voyez, sentez, goutez, img) VALUES (:idname, :name, :hook, :alcdegree, :desc, :ibu, :temp, :voyez, :sentez, :goutez, :img)');
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
      ':img' => $data['img']
    ]);
  }

  //update a beer
  public static function updateBeer(array $data): void {
    $db = self::dbAccess();

    $req = $db->prepare('UPDATE beers SET idname = :idname, name = :name, hook = :hook, alcdegree = :alcdegree, desc = :desc, ibu = :ibu, temp = :temp, voyez = :voyez, sentez = :sentez, goutez = :goutez, img = :img WHERE id = :id');
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

    $req = $db->prepare('DELETE FROM beers WHERE id = :id');
    $req->execute([
      ':id' => $id
    ]);
  }

  public function sanitizedData(): mixed {
    return array (
      'id' => htmlspecialchars($this->id),
      'idname' => htmlspecialchars($this->idname),
      'name' => htmlspecialchars($this->name),
      'hook' => htmlspecialchars($this->hook),
      'alcdegree' => htmlspecialchars($this->alcdegree),
      'desc' => htmlspecialchars($this->desc),
      'ibu' => htmlspecialchars($this->ibu),
      'temp' => htmlspecialchars($this->temp),
      'voyez' => htmlspecialchars($this->voyez),
      'sentez' => htmlspecialchars($this->sentez),
      'goutez' => htmlspecialchars($this->goutez),
      'img' => htmlspecialchars($this->img)
    );
  }
}