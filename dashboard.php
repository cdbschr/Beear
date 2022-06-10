<?php

if(!isset($_SESSION)){
  session_start();
}

require_once __DIR__ . '/vendor/autoload.php';
require_once 'app/Errors/eCatcher.php';

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
      // $beersController->updateBeer($data);
    }

    elseif ($_GET['action'] == 'deleteBeer') {
      // $beersController->deleteBeer($data);
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
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);
      $password = htmlspecialchars($_POST['password']);
      $id_roles = htmlspecialchars($_POST['id_roles']);

      if($id_roles === 'admin') {
        $id_roles = 1;
      } else if ($id_roles === 'editor') {
        $id_roles = 2;
      } else {
        $id_roles = 3;
      }

      $usersController->addUser($pseudo, $mail, $password, $id_roles);
    }

    elseif ($_GET['action'] == 'updateUser-page') {
      $dashboardController->updateUser($_GET['id']);
    }

    elseif ($_GET['action'] == 'updateUser-post') {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);

      $usersController->updateUserPost($_GET['id']);
    }
    
    elseif ($_GET['action'] == 'deleteUser') {
      $usersController->deleteUser($_GET['id']);
    }
    elseif($_GET['action'] == 'deconnect') {
      $usersController->deconnexion();
    }

  } else {
    if(isset($_SESSION['id']) && isset($_SESSION['mail']) && isset($_SESSION['pseudo']) && isset($_SESSION['id_roles'])) {
      $dashboardController->admin();
    } else {
      require 'app/Views/errors/oops.php';
    }
  }
} catch (Exception $e) {
  eCatcher($e);

  require 'app/Views/errors/404.php';

} catch(Error $e) {
  eCatcher($e);
  require 'app/Views/errors/oops.php';
}
