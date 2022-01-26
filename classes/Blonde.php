<?php

require_once 'Beer.php';

class Blonde extends Beer
{
	function __construct()
	{
		parent::__construct(
			"bblonde",
			"Beear Blonde",
			"L'ours sympa",
			8,
			"Les bières de la lignée des Beear sont nées de la pureté de l’eau et de la puissance du feu. Derrière sa robe couleur jaune flamme, BEEAR Blonde cache un bouquet d’épices et de céréales. En fin de bouche, c’est toute l’agréable amertume du houblon qui surgit au galop, rappelant à qui sait les boire que les Beear sont des bières uniques au caractère tonique.",
			18,
			"7-13°C",
			"Une mousse généreuse, persistante et compacte, blanche à fines bulles. Couleur blond soutenu, limpide et brillante",
			"Au nez, une complexe palette aromatique mêlant épices et céréales.",
			"Un bel équilibre entre corps, chaleur (alcool) et amertume. Persistance des notes épicées et du caractère alcoolisé.On retrouve à la dégustation des notes de céréales presque biscuitées. Une belle présence en bouche."
		);
	}
}
