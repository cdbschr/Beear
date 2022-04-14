<?php

namespace Beear\Controllers;

class FrontController extends Controller {
  function home(): void {
    include $this->viewFrontend('home');
  }

  function valeursPage(): void {
    include $this->viewFrontend('valeurs');
  }

  function actualitesPage(): void {
    include $this->viewFrontend('actualites');
  }

  function contactPage(): void {
    include $this->viewFrontend('/contact/contact');
  }

  // -------- Envoi dans la db les informations du formulaire de Contact --------
  function contactPost($data): void {

    $contact = new \Beear\Models\ContactsModel($data);

    if (filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
      $postMail = $contact::postMail($data);
      require $this->viewFrontend('/contact/contact-confirm');
    } else {
      header('Location:'.$this->viewFrontend('/contact/contact-error'));
    }
  }

  function inscriptionPage(): void {
    include $this->viewFrontend('auth/register');
  }

  // -------- Apres verification, enregistrement dans la db des informations pour création d'un compte --------
  function registerPost(): void {
    $userExist = \Beear\Models\UsersModel::userExist($_POST['mail']);

    if ($userExist) {
      header('Location:'.$this->viewFrontend('/auth/register-error'));
    } else {
      $registerData = [
        'lastname' => htmlspecialchars($_POST['lastname']),
        'firstname' => htmlspecialchars($_POST['firstname']),
        'mail' => htmlspecialchars($_POST['mail']),
        'password' => htmlspecialchars($_POST['password'])
      ];

      $register = \Beear\Models\UsersModel::register($registerData);

      if ($register) {
        header('Location:'.$this->viewFrontend('/auth/register-confirm'));
      } else {
        header('Location:'.$this->viewFrontend('/auth/register-error'));
      }
    }
  }

  function connexionPage(): void {
    include $this->viewFrontend('auth/login');
  }

  function loginPost($mail, $password): void {
    $login = \Beear\Models\UsersModel::login($mail, $password);

    if ($login) {
      header('Location:'.$this->viewFrontend('/auth/login-confirm'));
    } else {
      header('Location:'.$this->viewFrontend('/auth/login-error'));
    }

    $loginData = [
      'mail' => htmlspecialchars($_POST['mail']),
      'password' => htmlspecialchars($_POST['password'])
    ];

  }

  function deconnexion(): void {
    session_destroy();
    header('Location:'.$this->viewFrontend('/'));
  }
}