<?php 

if(!isset($_SESSION)) {
	session_start();
}

require_once __DIR__ . '/vendor/autoload.php';
require './app/Controllers/ContactSanitizer.php';

try {
  $frontController = new \Project\Controllers\FrontController();
  $contactController = new \Project\Controllers\ContactController();

	if(isset($_GET['action'])) { 
		if($_GET['action'] == 'valeurs') {
      $frontController->valeursPage();

		} elseif($_GET['action'] == 'actus') {
      $frontController->actualitesPage();
			
		} elseif($_GET['action'] == 'contact') {
			$frontController->contactPage();

		}	elseif($_GET['action'] == 'contactForm') {
			$data = new ContactSanitizer($_POST);

			$formData = $data->sanitize();
				
			if (!empty($formContactData['lastname']) && (!empty($formContactData['firstname']) && (!empty($formContactData['mail']) &&(!empty($formContactData['content'])) && (!empty($_POST['rgpd']))))) {
				$contactController->contactPost($formContactData);
			}

		}	elseif($_GET['action'] == 'login') {
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