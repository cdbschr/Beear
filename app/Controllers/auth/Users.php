<?php

namespace Beear\Controllers\auth;

use Beear\Controllers\Controller;

class Users extends Controller {
  function connexionPage(): void {
    include $this->viewFrontend('auth/login');
  }
  
  function loginPost($loginData): void {
    $login = \Beear\Models\auth\Users::login($loginData);
    $loginData = [
      'mail' => htmlspecialchars($_POST['mail']),
      'password' => htmlspecialchars($_POST['password'])
    ];
    
    if ($login) {
      header('Location:'.$this->viewAdmin('dashboard'));
    } else {
      throw new \Exception('Identifiants incorrects');
    }
  }

  function inscriptionPage(): void {
    include $this->viewAdmin('users/add-user');
  }

  // -------- Apres verification, enregistrement dans la db des informations pour création d'un compte --------
  function addUser(): void {
    $userExist = \Beear\Models\auth\Users::isUserExist($_POST['mail']);

    if ($userExist) {
      throw new \Exception('Cette adresse mail est déjà utilisée');
    } else {
      $registerData = [
        'lastname' => htmlspecialchars($_POST['lastname']),
        'firstname' => htmlspecialchars($_POST['firstname']),
        'mail' => htmlspecialchars($_POST['mail']),
        'password' => htmlspecialchars($_POST['password'])
      ];

      $register = \Beear\Models\auth\Users::registerUser($registerData);

      if ($register) {
        header('Location:'.$this->viewFrontend('/auth/register-confirm'));
      } else {
        throw new \Exception('Une erreur est survenue lors de l\'enregistrement');
      }
    }
  }

  // -------- mise à jour d'un utilisateur par rapport à son id --------
  function updateUser($data): void {
    $user = new \Beear\Models\auth\Users($data);
    $user->updateMailUser($data)->updatePasswordUser($data);

    $this->viewAdmin('users/manage-users');
  }

  // -------- suppression d'un utilisateur par rapport à son id --------
  function deleteUser($data): void {
    $id = htmlspecialchars($data['id']);
    $user = new \Beear\Models\auth\Users($data);
    $user->deleteBy('id', $id);

    $this->viewAdmin('users/manage-users');
  }

  function deconnexion(): void {
    session_destroy();
    header('Location:'.$this->viewFrontend('/'));
  }

  public function checkUser(): bool {
    if (isset($_SESSION['user'])) {
      return true;
    } else {
      return false;
    }
  }
}