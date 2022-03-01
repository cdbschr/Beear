<?php 

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {
  $frontController = new \Project\Controllers\FrontController(); 

	if(isset($_GET['action'])) { 

	} else {
		$frontController->home();
	}

} catch (Exception $e) {
  require 'app/Views/front/error.php';
}
