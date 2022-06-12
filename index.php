<?php

if (!isset($_SESSION)) {
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
  // -------- Récupération des Controllers --------
  $frontController = new Beear\Controllers\FrontController();
  $usersController = new Beear\Controllers\auth\Users();
  $beersController = new Beear\Controllers\content\Beers();
  $mailsController = new Beear\Controllers\content\Mails();

  // -------- Vérification dans le cas où il y a une action, sinon on retourne la page home --------
  if (isset($_GET['action'])) {
    /* ----------------------------------------------------------------
    ---------------- Affichage des pages dans le menu -----------------
    ---------------------------------------------------------------- */
  if ($_GET['action'] == 'valeurs') {
      $frontController->valeursPage();

  } elseif ($_GET['action'] == 'beer-page') {
      $beersController->beerPage($_GET['id']);

    } elseif ($_GET['action'] == 'contact') {
      $frontController->contactPage();

    } elseif ($_GET['action'] == 'rgpd') {
      $frontController->rgpdPage();

    } elseif ($_GET['action'] == 'mentionslegales') {
      $frontController->mentionsPage();
    
    /* ----------------------------------------------------------------
    ---------------- Gestion du formulaire de contact -----------------
    ---------------------------------------------------------------- */
  } elseif ($_GET['action'] == 'post-contactform') {
    $contact = new \Beear\Security\MailsSanitizer($_POST);
    $sanitizedDataContact = $contact->sanitizedDataContact();

    $sanitizedLastname = $sanitizedDataContact['lastname'];
    $sanitizedFirstname = $sanitizedDataContact['firstname'];
    $sanitizedMail = $sanitizedDataContact['mail'];
    $sanitizedContent = $sanitizedDataContact['content'];

    if (!empty($sanitizedLastname)
    && !empty($sanitizedFirstname)
    && !empty($sanitizedMail)
    && !empty($sanitizedContent)) {
      $mailsController->contactPost($sanitizedDataContact);
    }

    /* ----------------------------------------------------------------
    -------------------- Gestion de la Connexion ----------------------
    ---------------------------------------------------------------- */
    
    // ---------------- Connexion à un compte -----------------------
    } elseif ($_GET['action'] == 'login-page') {
      $usersController->connexionPage();

    } elseif ($_GET['action'] == 'login-post') {
      $mail= htmlspecialchars($_POST['mail']);
      $password = htmlspecialchars($_POST['password']);
      
      if (!empty($mail) && !empty($password)) {
        $usersController->loginPost($mail, $password);
      }

    // ---------------- Déconnexion d'un compte -----------------------
    } elseif ($_GET['action'] == 'deconnexion') {
      $usersController->deconnexion();
    
  }} else {
    $frontController->home();
  }
} catch (Exception $e) {
  require 'app/Views/errors/404.php';
  
} catch(Error $e) {
  eCatcher($e);
  require "app/views/errors/oops.php";
}