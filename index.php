<?php

use Project\Controllers\FrontController;

if(!isset($_SESSION)) {
	session_start();
}

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

		} elseif($_GET['action'] == 'contactForm') {
      
      if (!empty($formContactData['lastname']) && (!empty($formContactData['firstname']) && (!empty($formContactData['mail']) && (!empty($formContactData['content'])) && (!empty($_POST['rgpd']))))) {
        
        $formContactData = [
          'lastname' => htmlspecialchars($_POST['lastname']),
          'firstname' => htmlspecialchars($_POST['firstname']),
          'mail' => htmlspecialchars($_POST['mail']),
          'content' => htmlspecialchars($_POST['content'])
        ];
        $frontController->contactPost($formContactData);
			}
      
    } elseif($_GET['action'] == 'login') {
			$frontController->connexionPage();

		}	elseif($_GET['action'] == 'register') {
			$frontController->inscriptionPage();

		} elseif($_GET['action'] == 'deconnexion') {
			//$frontController->deconnexionPage();

		}
	} else {
		$frontController->home();
	}

} catch (Exception $e) {
  require 'app/Views/errors/404.php';
}