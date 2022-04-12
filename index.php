<?php

if (!isset($_SESSION)) {
  session_start();
}

require_once __DIR__ . '/vendor/autoload.php';

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
      $sanitizedDataContact = $contact->sanitizedDataContact();

      $satinizedLastname = $sanitizedDataContact['lastname'];
      $satinizedFirstname = $sanitizedDataContact['firstname'];
      $satinizedMail = $sanitizedDataContact['mail'];
      $satinizedContent = $sanitizedDataContact['content'];
      
      if (!empty($satinizedLastname) && (!empty($satinizedFirstname) && (!empty($satinizedMail) && (!empty($satinizedContent))))) {
        $frontController->contactPost($satinizedData);
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
