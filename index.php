<?php

if (!isset($_SESSION)) {
  session_start();
}

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
  // -------- Récupération des Controllers --------
  $frontController = new \Beear\Controllers\FrontController();

  // -------- Vérification dans le cas où il y a une action, sinon on retourne la page home --------
  if (isset($_GET['action'])) {
    /* ----------------------------------------------------------------
    ---------------- Affichage des pages dans le menu -----------------
    ---------------------------------------------------------------- */
    if ($_GET['action'] == 'valeurs') {
      $frontController->valeursPage();

    } elseif ($_GET['action'] == 'actus') {
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

      if (!empty($sanitizedLastname) && (!empty($sanitizedFirstname) && (!empty($sanitizedMail) && (!empty($sanitizedContent))))) {
        $frontController->contactPost($sanitizedDataContact);
      }

      /* ----------------------------------------------------------------
    -------------------- Gestion de la Connexion ----------------------
    ---------------------------------------------------------------- */
    } elseif ($_GET['action'] == 'login') {
      $frontController->connexionPage();

    } elseif ($_GET['action'] == 'register') {
      $frontController->inscriptionPage();

    } elseif ($_GET['action'] == 'post-register') {
      if (
        !empty($registerData['lastname']) &&
        (!empty($registerData['firstname']) &&
          (!empty($registerData['mail']) &&
            (!empty($registerData['password']))))
      ) {

        $registerData = [
          'lastname' => htmlspecialchars($_POST['lastname']),
          'firstname' => htmlspecialchars($_POST['firstname']),
          'mail' => htmlspecialchars($_POST['mail']),
          'password' => htmlspecialchars($_POST['password'])
        ];

        $frontController->registerPost($registerData);
      }
    } elseif ($_GET['action'] == 'deconnexion') {
      $frontController->deconnexion();

    }
  } else {
    $frontController->home();
  }
} catch (Exception $e) {
  require 'app/Views/errors/404.php';
}