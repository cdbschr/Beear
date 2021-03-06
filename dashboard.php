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
  $mailsController = new \Beear\Controllers\content\Mails();
  

  if (isset($_GET['action'])) {
    /* ----------------------------------------------------------------
    ------------------------------ Bières -----------------------------
    ---------------------------------------------------------------- */
    if ($_GET['action'] == 'beers') {
      $dashboardController->managebeers();
    }
    
    elseif ($_GET['action'] == 'updateBeer-page') {
      $dashboardController->updateBeer($_GET['id']);
    }

    elseif ($_GET['action'] == 'updateBeer-post') {
      $id = $_GET['id'];
      $idname = explode('eear ', $_POST['name']);
      $idname = strtolower(implode($idname));
      $img = $_POST['img'] ?? null;

      $data = [
        'idname' => htmlspecialchars($idname),
        'name' => htmlspecialchars($_POST['name']),
        'hook' => htmlspecialchars($_POST['hook']),
        'alcdegree' => htmlspecialchars($_POST['alcdegree']),
        'desc' => htmlspecialchars($_POST['desc']),
        'ibu' => htmlspecialchars($_POST['ibu']),
        'temp' => htmlspecialchars($_POST['temp']),
        'voyez' => htmlspecialchars($_POST['voyez']),
        'sentez' => htmlspecialchars($_POST['sentez']),
        'goutez' => htmlspecialchars($_POST['goutez']),
        'id' => $id
      ];

      $beersController->updateBeer($data, $id);
    } 
    
    elseif ($_GET['action'] == 'deleteBeer-post') {
      $beersController->deleteBeer($_GET['id']);
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
      $id = htmlspecialchars($_GET['id']);

      $usersController->updateUserPost($pseudo, $mail, $id);
    }
    
    elseif ($_GET['action'] == 'deleteUser') {
      $usersController->deleteUser($_GET['id']);
    }

    elseif($_GET['action'] == 'deconnect') {
      $usersController->deconnexion();
    }

    /* ----------------------------------------------------------------
    ----------------------------- Mails -------------------------------
    ---------------------------------------------------------------- */
    elseif ($_GET['action'] == 'mails') {
      $dashboardController->manageMails();
    }

    elseif ($_GET['action'] == 'readMail-page') {
      $dashboardController->readMail($_GET['id']);
    }

    elseif ($_GET['action'] == 'deleteMail') {
      $mailsController->deleteMail($_GET['id']);
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