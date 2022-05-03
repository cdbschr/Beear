<?php

if (!isset($_SESSION)) {
  session_start();
}

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

  // -------- Transformation du Warning en exception --------
function errorHandler($errno, $errstr, $errfile, $errline) {
  throw new Exception($errstr, $errno);
}
set_error_handler('errorHandler');

function eCatcher($e) {
  if($_ENV["APP_ENV"] == "dev") {
    $whoops = new \Whoops\Run;
    $whoops->allowQuit(false);
    $whoops->writeToOutput(false);
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $html = $whoops->handleException($e);

    require './app/Views/errors/eCatcher.php';
  }
}

try {
  // -------- Récupération des Controllers --------
  $frontController = new Beear\Controllers\FrontController();
  $userController = new Beear\Controllers\auth\UsersController();
  $beersController = new Beear\Controllers\content\BeersController();

  // -------- Vérification dans le cas où il y a une action, sinon on retourne la page home --------
  if (isset($_GET['action'])) {
    /* ----------------------------------------------------------------
    ---------------- Affichage des pages dans le menu -----------------
    ---------------------------------------------------------------- */
  if ($_GET['action'] == 'valeurs') {
      $frontController->valeursPage();

    } elseif ($_GET['action'] == 'actualites') {
      $frontController->actualitesPage();

    } elseif ($_GET['action'] == 'contact') {
      $frontController->contactPage();
    
    /* ----------------------------------------------------------------
    ---------------- Gestion du formulaire de contact -----------------
    ---------------------------------------------------------------- */
    } elseif ($_GET['action'] == 'post-contactform') {
      $contact = new \Beear\Models\ContactsModel($_POST);
      $sanitizedDataContact = $contact->sanitizedDataContact();

      $sanitizedLastname = $sanitizedDataContact['lastname'];
      $sanitizedFirstname = $sanitizedDataContact['firstname'];
      $sanitizedMail = $sanitizedDataContact['mail'];
      $sanitizedContent = $sanitizedDataContact['content'];

      if (!empty($sanitizedLastname)
      && (!empty($sanitizedFirstname) 
      && (!empty($sanitizedMail) 
      && (!empty($sanitizedContent))))) {
        $frontController->contactPost($sanitizedDataContact);
      }

    /* ----------------------------------------------------------------
    -------------------- Gestion de la Connexion ----------------------
    ---------------------------------------------------------------- */
    
    // ---------------- Connexion à un compte -----------------------
    } elseif ($_GET['action'] == 'login') {
      $userController->connexionPage();

    } elseif ($_GET['action'] == 'login-post') {
      $user = new \Beear\Models\auth\UsersModel($_POST);
      $sanitizedDataUser = $user->sanitizedDataUser();

      $sanitizedMail = $sanitizedDataUser['mail'];
      $sanitizedPassword = $sanitizedDataUser['password'];

      if (!empty($sanitizedMail) && (!empty($sanitizedPassword))) {
        $userController->loginPost($sanitizedDataUser);
      }

    // ---------------- Enregistrement d'un compte -----------------------
    } elseif ($_GET['action'] == 'register') {
      $userController->inscriptionPage();

    } elseif ($_GET['action'] == 'post-register') {
      $register = new \Beear\Models\auth\UsersModel($_POST);
      $sanitizedDataRegister = $register->sanitizedDataUser();

      $sanitizedLastname = $sanitizedDataRegister['lastname'];
      $sanitizedFirstname = $sanitizedDataRegister['firstname'];
      $sanitizedMail = $sanitizedDataRegister['mail'];
      $sanitizedPassword = $sanitizedDataRegister['password'];

      if (!empty($sanitizedLastname) 
      && (!empty($sanitizedFirstname) 
      && (!empty($sanitizedMail) 
      && (!empty($sanitizedPassword))))) {
        $userController->registerPost($sanitizedDataRegister);
      }
    // ---------------- Déconnexion d'un compte -----------------------
    } elseif ($_GET['action'] == 'deconnexion') {
      $userController->deconnexion();
    
  }} else {
    $frontController->home();
  }
} catch (Exception $e) {
  require 'app/Views/errors/404.php';
} catch(Error $e) {
  eCatcher($e);
  require "app/views/errors/oops.php";
}