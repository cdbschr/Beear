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
			"6-8°C");
		}
}
