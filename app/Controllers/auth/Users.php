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
    
    if (password_verify($password, $login['password'])) {
      $_SESSION['mail'] = $login['mail'];
      $_SESSION['id'] = $login['id'];
      $_SESSION['pseudo'] = $login['pseudo'];
      $_SESSION['id_roles'] = $login['id_roles'];

      header('Location:/dashboard.php');
    }
  }
  
  // -------- enregistrement dans la db des informations pour création d'un compte --------
  function addUser($pseudo, $mail, $password, $id_roles): mixed {
    $user = new \Beear\Models\auth\Users();

    $user->createUser($pseudo, $mail, $password, $id_roles);
    header('Location:'.$this->viewAdmin('users/register-confirm'));
  }

  // -------- mise à jour d'un utilisateur par rapport à son id --------
  private $manager;
  function updateUserPost($id, $pseudo = null, $mail = null, $password = null): void {
    $updateUser = $this->manager->getUserById($id);
    $user = new \Beear\Models\auth\Users();
    $user->updateUser($pseudo, $mail, $password, $id);

    require_once $this->viewAdmin('users/update-user');
  }

  // -------- suppression d'un utilisateur par rapport à son id --------
  function deleteUser($id): void {
    $user = new \Beear\Models\auth\Users();
    $user->deleteUser($id);

    header('Location:dashboard.php/?action=users');
  }

  // -------- gestion et verification de la connexion --------
  function deconnexion(): void {
    session_destroy();
    header('Location:/');
  }

}