<?php

namespace Beear\Controllers;

class FrontController extends Controller
{
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
  function contactPost($formContactData): void {
    if (filter_var($formContactData['mail'], FILTER_VALIDATE_EMAIL)) {
      $postMail = \Beear\Models\ContactsModel::postMail($formContactData);
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

  function loginPost(): void {
    $loginData = [
      'mail' => htmlspecialchars($_POST['mail']),
      'password' => htmlspecialchars($_POST['password'])
    ];

    $login = \Beear\Models\UsersModel::login($loginData);

    if ($login) {
      header('Location:'.$this->viewFrontend('/auth/login-confirm'));
    } else {
      header('Location:'.$this->viewFrontend('/auth/login-error'));
    }
  }
}