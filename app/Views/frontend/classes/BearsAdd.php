<?php 

include_once 'Beer.php';

class Beears {
	public array $beears = [];
	
	public function addBeear(Beer $beer):void {
		array_push($this->beears, $beer);
	}
	
	public function foreachBeears() {
		foreach ($this->beears as $beer) {
			echo '<div id="' . $beer->getId() . '" class="presentationbiere">';
			echo '<header class="titrebiere">';
			echo '<h3>' . $beer->getName() . '</h3>';
			echo '<p>' . $beer->getSecName() . ' | Alc.' . $beer->getAlcDegree() . '</p>';
			echo '</header>';
			echo '<img src="/public/frontend/img/verres/Verre-de-bière-'.$beer->getId().'.png" alt="bière blonde beear" class="verrebiere">';
			echo '<a href="' . $beer->getId() . '.php" class="button buttonbiere">';
			echo '<p>En savoir plus</p>';
			echo '</a>';
			echo '</div>';
		}
	}
}