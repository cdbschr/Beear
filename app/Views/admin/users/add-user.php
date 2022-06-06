<?php
require_once 'app/Views/admin/layouts/head.php';
?>
<main>
  <section class="pres-dashboard">
    <div class="container">
    <a href="/?action=deconnexion" class="button" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie ajout d'un utilisateur</h1>
    </div>
    </div>
  </section>
  <section>
    <form method="POST" id="register-user" action="dashboard.php?action=addUser-post">
      <?php if(isset($e)):
        if ($e) :
         foreach($e as $error): ?>
          <p class="error"><?= $error ?></p>
      <?php endforeach; endif; endif; ?>
    <div class="form-group">
      <label for="input-pseudo">Pseudo</label>
      <input type="text" class="form-control" name="pseudo" value="<?php if(isset($_POST['pseudo'])) echo htmlspecialchars($_POST['pseudo'])?>" placeholder="Saisissez le pseudo..." required>
    </div>
    <div class="form-group">
      <label for="input-email">Adresse mail</label>
      <input type="email" class="form-control" name="mail" value="<?php if(isset($_POST['mail'])) echo htmlspecialchars($_POST['mail'])?>" placeholder="Saisissez l'adresse mail..." required>
    </div>
    <div class="form-group">
      <label for="input-password">Mot de passe</label>
      <input type="password" class="form-control" name="password" placeholder="Saisissez un mot de passe..." required>
    </div>
    <div class="form-group">
      <label for="input-password">Confirmation de votre mot de passe</label>
      <input type="password" class="form-control" name="password_confirmation" placeholder="Veuillez re-saisir le mot de passe..." required>
    </div>
    <label for="input-role">Role</label>
    <select name="id_roles" id="role-select">
      <option value=""> --- Veuillez choisir le rôle de l'utilisateur --- </option>
      <option value="admin">Admin</option>
      <option value="editor">Editeur</option>
      <option value="members">Membre</option>
    </select>
      <button type="submit" class="button">Créer le compte</button>
    </form>
  </section>
</main>
</body>
</html>