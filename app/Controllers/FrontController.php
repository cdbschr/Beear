<?php

namespace Beear\Controllers;

class FrontController extends Controller
{
  function home(): void
  {
    include $this->viewFrontend('home');
  }

  function valeursPage(): void
  {
    include $this->viewFrontend('valeurs');
  }

  function actualitesPage(): void
  {
    include $this->viewFrontend('actualites');
  }

  function contactPage(): void
  {
    include $this->viewFrontend('/contact/contact');
  }

  function contactPost($formContactData)
  {

    if (filter_var($formContactData['mail'], FILTER_VALIDATE_EMAIL)) {
      $postMail = \Beear\Models\ContactModel::postMail($formContactData);
      require 'app/Views/frontend/contact/contact-confirm.php';
    } else {
      header('Location: app/Views/frontend/contact/contact-error.php');
    }
  }

  function inscriptionPage(): void
  {
    include $this->viewFrontend('auth/register');
  }

  function registerPost(): void
  {
    $userExist = \Beear\Models\UsersModel::userExist($_POST['mail']);

    if ($userExist) {
      header('Location: app/Views/frontend/auth/register-error.php');
    } else {
      $registerData = [
        'lastname' => htmlspecialchars($_POST['lastname']),
        'firstname' => htmlspecialchars($_POST['firstname']),
        'mail' => htmlspecialchars($_POST['mail']),
        'password' => htmlspecialchars($_POST['password'])
      ];

      $register = \Beear\Models\UsersModel::register($registerData);

      if ($register) {
        header('Location: app/Views/frontend/auth/register-confirm.php');
      } else {
        header('Location: app/Views/frontend/auth/register-error.php');
      }
    }
  }

  function connexionPage(): void
  {
    include $this->viewFrontend('auth/login');
  }
}
