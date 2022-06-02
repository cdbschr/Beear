<?php

if(!isset($_SESSION)){
  session_start();
}

require_once __DIR__ . '/vendor/autoload.php';
require_once 'app/Errors/eCatcher.php';
require_once 'app/Controllers/auth/Sanitizer.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// -------- Transformation du Warning en exception --------
function errorHandler($errno, $errstr, $errfile, $errline) {
	throw new Exception($errstr, $errno);
}

set_error_handler('errorHandler');

try {
  $dashboardController = new \Beear\Controllers\DashboardController();
  $usersController = new \Beear\Controllers\auth\Users();
  $beersController = new \Beear\Controllers\content\Beers();
  

  if (isset($_GET['action'])) {

    /* ----------------------------------------------------------------
    ------------------------------ Bières -----------------------------
    ---------------------------------------------------------------- */
    if ($_GET['action'] == 'beers') {
      $dashboardController->managebeers();
    }
    
    elseif ($_GET['action'] == 'addBeer-page') {
      $dashboardController->addBeer();
    }
    
    elseif ($_GET['action'] == 'updateBeer') {
      $beersController->updateBeer($data);
    }

    elseif ($_GET['action'] == 'deleteBeer') {
      $beersController->deleteBeer($data);
    }

    /* ----------------------------------------------------------------
    -------------------------- Utilisateurs ---------------------------
    ---------------------------------------------------------------- */
    elseif ($_GET['action'] == 'users') {
      $dashboardController->manageUsers();
    }

    elseif ($_GET['action'] == 'addUser-page') {
      $dashboardController->addUser();
    }

    elseif ($_GET['action'] == 'addUser-post') {
      $sanitize = new \Beear\Controllers\auth\Sanitizer($_POST);
      $register = $sanitize->sanitizedRegister();
      
      $sanitizedLastname = $register['lastname'];
      $sanitizedFirstname = $register['firstname'];
      $sanitizedMail = $register['mail'];
      $sanitizedPassword = $register['password'];
      
      if (!empty($sanitizedLastname) 
      && !empty($sanitizedFirstname) 
      && !empty($sanitizedMail) 
      && !empty($sanitizedPassword)) {
        $usersController->addUser($register);
      }
    }

    elseif ($_GET['action'] == 'updateUser-page') {
      $usersController->updateUser($data['id']);
    }
    
    elseif ($_GET['action'] == 'deleteUser') {
      $usersController->deleteUser($_GET['id']);
    }

  } else {
    $dashboardController->admin();
  }
} catch (Exception $e) {
  require 'app/Views/errors/404.php';

} catch(Error $e) {
  eCatcher($e);
  require 'app/Views/errors/oops.php';
}
