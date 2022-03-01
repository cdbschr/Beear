<?php

require_once 'Beer.php';

class Blanche extends Beer
{
	function __construct()
	{
		parent::__construct(
			"bblanche", 
			"Beear Blanche", 
			"L'ours tout doux", 
			5, 
			"Beear Blanche saura vous surprendre. Sa complexité aromatique en fait une bière unique en son genre. Elle présente la particularité de mettre en avant une douce acidité, un fruité riche sur fond de céréales et est particulièrement désaltérante. Une personnalité audacieuse et originale pour cette bière mystérieuse, élégante et tout en finesse.", 
			7, 
			"6-8°C",
			"Très beau col de mousse blanche crémeuse, bulles régulières, de la tenue. Une couleur blond vénitien orangé, profonde et homogène.",
			"Bouquet fruité très doux, acidulé et très légèrement sucré : baies rouges, pêche, pêche de vignes, grains de raisins et mangue. Notes de céréales, puis banane et zestes de citron.",
			"L’attaque est tonique : une acidité tendre interpelle les papilles et rend cette bière immédiatement rafraîchissante. Finement pétillante, texture fluide et douce chaleur en fond de bouche. Au fil de sa dégustation, elle dévoile progressivement des arômes de baies rouges qui se prolongent sous forme de zestes de citron. La finale est riche et agréable. Elle présente une étonnante et belle longueur sans être supportée par une amertume marquée."
		);
		}
}
