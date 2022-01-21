<?php

require_once './Beer.php';

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
			"7-13°C"
		);
	}
}
