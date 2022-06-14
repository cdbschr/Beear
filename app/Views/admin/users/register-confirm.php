<?php 
if (isset($_SESSION['id_roles']) && $_SESSION['id_roles'] === 1) {
	require_once 'app/Views/admin/layouts/head.php';
} else {
	header('Location:/app/Views/errors/404.php');
}
header('Refresh: 10; URL=/dashboard.php?action=users'); ?>

<div class="confirm">
  <h1>L'utilisateur a été crée avec succès !</h1>
  <p>Vous allez être rediriger automatiquement sur le site.</p>

  <a href="/dashboard.php?action=users">Retourner immédiatement sur le site</a>
</div>