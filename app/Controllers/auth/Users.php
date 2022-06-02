<?php

namespace Beear\Controllers\auth;

use Beear\Controllers\Controller;

class Users extends Controller {
  function connexionPage(): void {
    require_once $this->viewFrontend('auth/login');
  }
  
  // -------- connexion à son compte --------
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
  
  // -------- enregistrement dans la db des informations pour création d'un compte --------
  function addUser($register): void {
    $req = \Beear\Models\auth\Users::createUser($register);

    if ($req) {
      header('Location:'.$this->viewAdmin('users/register-confirm'));
    } else {
      throw new \Exception('Une erreur est survenue lors de l\'enregistrement');
    }
  }

  // -------- mise à jour d'un utilisateur par rapport à son id --------
  function updateUser($data): void {
    $user = new \Beear\Models\auth\Users($data);
    $user->updateMailUser($data)->updatePasswordUser($data);

    require_once $this->viewAdmin('Users/manage-Users');
  }

  // -------- suppression d'un utilisateur par rapport à son id --------
  function deleteUser($data): void {
    $id = htmlspecialchars($data['id']);
    $user = new \Beear\Models\auth\Users($data);
    var_dump($user);die;
    $user->deleteBy('id', $id);

    require_once $this->viewAdmin('Users/manage-Users');
  }

  // -------- gestion et verification de la connexion --------
  function deconnexion(): void {
    session_destroy();
    header('Location:/');
  }

  function checkUser(): bool {
    if (isset($_SESSION['user'])) {
      return true;
    } else {
      return false;
    }
  }
}