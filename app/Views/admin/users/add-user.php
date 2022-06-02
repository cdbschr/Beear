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
    <div class="form-group">
      <label for="input-lastname">Nom</label>
      <input type="text" class="form-control" name="lastname" aria-describedby="lastnameHelp" placeholder="Saisissez le nom..." required>
    </div>
    <div class="form-group">
      <label for="input-firstname">Prénom</label>
      <input type="text" class="form-control" name="firstname" aria-describedby="firstnameHelp" placeholder="Saisissez le prénom..." required>
    </div>
    <div class="form-group">
      <label for="input-email">Adresse mail</label>
      <input type="email" class="form-control" name="mail" aria-describedby="emailHelp" placeholder="Saisissez l'adresse mail..." required>
    </div>
    <div class="form-group">
      <label for="input-password">Mot de passe</label>
      <input type="password" class="form-control" name="password" placeholder="Saisissez un mot de passe..." required>
    </div>
    <!-- <select name="role" id="role-select"> -->
      <!-- <option value=""> -- Veuillez choisir un rôle -- </option> -->
      <?php //foreach ($roles as $role) : ?>
        <!-- <option value="<?php //echo //$role->id ?>"><?php //echo //$role->name ?></option> -->
      <?php //endforeach; ?>
      <!-- <option value="admin">Admin</option>
      <option value="editor">Editeur</option>
      <option value="members">Membre</option>
    </select> -->
      <button type="submit" class="button">Créer le compte</button>
    </form>
  </section>
</main>
</body>
</html>