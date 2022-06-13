<?php
if (isset($_SESSION['id_roles']) && $_SESSION['id_roles'] === 1) {
	require_once 'app/Views/admin/layouts/head.php';
} else {
	header('Location:/app/Views/errors/404.php');
}
?>
<main>
  <section class="pres-dashboard">
    <a href="/dashboard.php?action=users" class="button return" title="retourner à la page précédente">Retour aux Utilisateurs</a>
    <a href="/?action=deconnexion" class="button deco" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie mise à jour d'un utilisateur</h1>
    </div>
  </section>
  <section class="container">
    <form method="post" id="update-user" action="dashboard.php?action=updateUser-post&id=<?=$id;?>">
    <div class="form-group">
    <div class="form-group">
      <label for="input-pseudo">Pseudo</label>
      <input type="text" class="form-control" name="pseudo" value="<?=$user['pseudo'];?>" placeholder="Saisissez le pseudo...">
    </div>
    <div class="form-group">
      <label for="input-email">Adresse mail</label>
      <input type="email" class="form-control" name="mail" value="<?=$user['mail'];?>" placeholder="Saisissez l'adresse mail...">
    </div>
    <button type="submit" class="button">Mettre à jour le compte</button>
    </form>
  </section>
</main>
</body>
</html>