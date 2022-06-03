<?php

namespace Beear\Controllers\auth;

use Beear\Controllers\Controller;

class Users extends Controller {
  function connexionPage(): void {
    require_once $this->viewFrontend('auth/login');
  }
  
  // -------- connexion à son compte --------
  function loginPost($mail, $password): void {
    $login = \Beear\Models\auth\Users::login($mail);
    
    if ($login && password_verify($password, $login['password'])) {
      $_SESSION['mail'] = $login['mail'];
      $_SESSION['id'] = $login['id'];
      $_SESSION['firstname'] = $login['firstname'];
      $_SESSION['lastname'] = $login['lastname'];
      $_SESSION['role'] = $login['role'];

      header('Location:'.$this->viewAdmin('dashboard'));

    } else {
      $e = throw new \Exception('Identifiants incorrects');
    }
  }
  
  // -------- enregistrement dans la db des informations pour création d'un compte --------
  function addUser($register): void {
    $r = \Beear\Models\auth\Users::createUser($register);

    if ($r) {
      header('Location:'.$this->viewAdmin('users/register-confirm'));

    } else {
      $e = throw new \Exception('Une erreur est survenue lors de l\'enregistrement');
    }
  }

  // -------- mise à jour d'un utilisateur par rapport à son id --------
  function updateUser($data): void {
    $user = new \Beear\Models\auth\Users($data);
    $user->updateMailUser($data) || $user->updatePasswordUser($data);

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