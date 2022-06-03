<?php

namespace Beear\Controllers\content;

class BeersSanitizer {
  public function __construct(array $createBeer) {
    $this->id = $createBeer['id'];
    $this->idname = $createBeer['idname'];
    $this->name = $createBeer['name'];
    $this->hook = $createBeer['hook'];
    $this->alcdegree = $createBeer['alcdegree'];
    $this->desc = $createBeer['desc'];
    $this->ibu = $createBeer['ibu'];
    $this->temp = $createBeer['temp'];
    $this->voyez = $createBeer['voyez'];
    $this->sentez = $createBeer['sentez'];
    $this->goutez = $createBeer['goutez'];
    $this->img = $createBeer['img'];
  }

  public function sanitizedBeers(): array {
    return array(
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