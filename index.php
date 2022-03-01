<?php 

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {
  $frontController = new \Project\Controllers\FrontController(); 

	if(isset($_GET['action'])) { 
		if($_GET['action'] == 'valeurs') {
      $frontController->valeursPage();

		} elseif($_GET['action'] == 'actus') {
      $frontController->actualitesPage();
			
		} elseif($_GET['action'] == 'contact') {
			$frontController->contactPage();
		}
	} else {
		$frontController->home();
	}

} catch (Exception $e) {
  require 'app/Views/errors/404.php';
}