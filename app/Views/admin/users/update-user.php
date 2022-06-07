<?php
if (isset($_SESSION['id_roles']) && $_SESSION['id_roles'] === 1) {
	require_once 'app/Views/admin/layouts/head.php';
} else {
	header('Location:/app/Views/errors/404.php');
}
?>
<main>
  <section class="pres-dashboard">
    <div class="container">
    <a href="" class="button" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie mise à jour d'un utilisateur</h1>
    </div>
    </div>
  </section>
  <section>
  <section>
    <form id="update-user" action="dashboard.php?action=updateUser-post">
    <div class="form-group">
    <div class="form-group">
      <label for="input-pseudo">Pseudo</label>
      <input type="text" class="form-control" name="pseudo" value="<?= $user['pseudo'] ?>" placeholder="Saisissez le pseudo...">
    </div>
    <div class="form-group">
      <label for="input-email">Adresse mail</label>
      <input type="email" class="form-control" name="mail" value="<?= $user['mail'] ?>" placeholder="Saisissez l'adresse mail...">
    </div>
    <div class="form-group">
      <label for="input-password">Mot de passe</label>
      <input type="password" class="form-control" name="password" placeholder="Saisissez un mot de passe...">
    </div>
    <div class="form-group">
      <label for="input-password">Confirmation de votre mot de passe</label>
      <input type="password" class="form-control" name="password_confirmation" placeholder="Veuillez re-saisir le mot de passe...">
    </div>
      <button type="submit" class="button">Mettre à jour le compte</button>
    </form>
  </section>
  </section>
</main>
</body>
</html>