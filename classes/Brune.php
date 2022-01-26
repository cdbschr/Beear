<?php

require_once 'Beer.php';

class Brune extends Beer
{
	function __construct()
	{
		parent::__construct(
			"bbrune",
			"Beear Brune",
			"L'ours robuste",
			11,
			"Véritable cadeau du brasseur, Beear Bune est une bière brune à la mousse abondante et à la douce amertume. Ronde et légèrement épicée, elle révèle une saveur typique de caramel et se ponctue sur une note délicatement sucrée. Servie dans son fameux verre, vous y découvrirez la parfaite réunion sucrée-amer.",
			27,
			"7-13°C",
			"Robe blonde cuivrée. Mousse épaisse blanche.",
			"Odeur maltée de céréales, pargum de résine et d'écorce. Légère note de pelures d'oranges.",
			"Corps rond et puissant, saveurs de malts grilllés. houblon franc aux notes fruitées et à l'amertume marquée."
		);
	}
}
