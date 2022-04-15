<?php

namespace Beear\Controllers;

class UsersController extends Controller {
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

  function loginPost($loginData): void {
    $login = \Beear\Models\UsersModel::login($loginData);
    $loginData = [
      'mail' => htmlspecialchars($_POST['mail']),
      'password' => htmlspecialchars($_POST['password'])
    ];

    if ($login) {
      header('Location:'.$this->viewAdmin('dashboard'));
    } else {
      header('Location:'.$this->viewFrontend('/auth/login-error'));
    }
  }

  function deconnexion(): void {
    session_destroy();
    header('Location:'.$this->viewFrontend('/'));
  }
}