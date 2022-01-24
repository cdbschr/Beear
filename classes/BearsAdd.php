<?php 

require_once 'Beer.php';
require_once 'Blonde.php';
require_once 'Brune.php';
require_once 'Blanche.php';

class Beears {
	private array $beears = [];

	function __construct(array $beears) {
		$this->beears = $beears;
	}

	public function addBeear(Beears $beer) {
		array_push($this->beears, $beer);
	}

	public function foreachBeears() {
		foreach ($this->beears as $beer) {
			echo '<div id="' . $beer->getId() . '" class="presentationbiere">';
			echo '<header class="titrebiere">';
			echo '<h3>' . $beer->getName() . '</h3>';
			echo '<p>' . $beer->getSecName() . ' | Alc.' . $beer->getAlcDegree() . '</p>';
			echo '</header>';
			echo '<img src="./img/verres/Verre-de-bière-'.$beer->getId().'.png" alt="bière blonde beear" class="verrebiere">';
			echo '<a href="' . $beer->getId() . '.php" class="button buttonbiere">';
			echo '<p>En savoir plus</p>';
			echo '</a>';
			echo '</div>';
		}
	}
}

var_dump($beears->foreachBeears());

$blonde = new Blonde;
$brune = new Brune;
$blanche = new Blanche;