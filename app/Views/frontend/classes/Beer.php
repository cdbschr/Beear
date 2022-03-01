<?php 

class Beer {
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

	public function __construct(string $id, string $name, string $secName, int $alcDegree, string $desc, int $ibu, string $temp, string $voyez, string $sentez, string $goutez) {
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
	}

  public function getId():string {
    return $this->id;
  }

  public function getName():string {
    return $this->name;
  }

  public function getSecName():string {
    return $this->secName;
  }

  public function getAlcDegree():int {
    return $this->alcDegree;
  }

  public function getDesc():string {
    return $this->desc;
  }

  public function getIbu():int {
    return $this->ibu;
  }

  public function getTemp():string {
    return $this->temp;
  }

  public function getVoyez():string {
    return $this->voyez;
  }
  
  public function getSentez():string {
    return $this->sentez;
  }
  
  public function getGoutez():string {
    return $this->goutez;
  }
}
