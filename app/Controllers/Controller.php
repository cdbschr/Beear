<?php

namespace Beear\Controllers;

class Controller
{
	public function viewFrontend($view)
	{
		return 'app/Views/frontend/' . $view . '.php';
	}

	public function viewAdmin($view)
	{
		return 'app/Views/admin/' . $view . '.php';
	}
}
