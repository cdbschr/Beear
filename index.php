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
  $actusController = new Beear\Controllers\content\ActusController();

  // -------- Vérification dans le cas où il y a une action, sinon on retourne la page home --------
  if (isset($_GET['action'])) {
    /* ----------------------------------------------------------------
    ---------------- Affichage des pages dans le menu -----------------
    ---------------------------------------------------------------- */
  if ($_GET['action'] == 'valeurs') {
      $frontController->valeursPage();

    } elseif ($_GET['action'] == 'actualites') {
      $actusController->showAllActus();

    } elseif ($_GET['action'] == 'contact') {
      $frontController->contactPage();
    
    /* ----------------------------------------------------------------
    ---------------- Affichage des Actualités (Blog) ------------------
    ---------------------------------------------------------------- */
    } elseif($_GET['action'] == "actu") {
      $id = $_GET['id'];
      $actusController->showSingleActu($id);

    /* ----------------------------------------------------------------
    ---------------- Gestion du formulaire de contact -----------------
    ---------------------------------------------------------------- */
    } elseif ($_GET['action'] == 'post-contactform') {
      $contact = new \Beear\Models\ContactsModel($_POST);
      $sanitizedDataContact = $contact->sanitizedDataContact();

      $sanitizedContactLastname = $sanitizedDataContact['lastname'];
      $sanitizedContactFirstname = $sanitizedDataContact['firstname'];
      $sanitizedContactMail = $sanitizedDataContact['mail'];
      $sanitizedContactContent = $sanitizedDataContact['content'];

      if (!empty($sanitizedContactLastname) && (!empty($sanitizedContactFirstname) && (!empty($sanitizedContactMail) && (!empty($sanitizedContactContent))))) {
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

      $sanitizedUserLastname = $sanitizedDataRegister['lastname'];
      $sanitizedUserFirstname = $sanitizedDataRegister['firstname'];
      $sanitizedUserMail = $sanitizedDataRegister['mail'];
      $sanitizedUserPassword = $sanitizedDataRegister['password'];

      if (!empty($sanitizedUserLastname) 
      && (!empty($sanitizedUserFirstname) 
      && (!empty($sanitizedUserMail) 
      && (!empty($sanitizedUserPassword))))) {
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