<?php
require_once 'app/Views/admin/layouts/head.php';
?>
<main>
  <section class="pres-dashboard">
    <div class="container">
    <a href="" class="button" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie ajout d'un utilisateur</h1>
    </div>
    </div>
  </section>
  <section>
    <form>
      <div class="form-group">
        <label for="input-email">Votre adresse mail</label>
        <input type="email" class="form-control" id="inputMail" aria-describedby="emailHelp" placeholder="Veuillez entrer votre adresse mail, ici..." required>
      </div>
      <div class="form-group">
        <label for="input-password">Votre mot de passe</label>
        <input type="password" class="form-control" id="inputPass" placeholder="Veuillez entrer votre mot de passe, ici..." required>
      </div>
      <div class="form-group">
        <label for="input-password">Veuillez confirmer votre mot de passe</label>
        <input type="password" class="form-control" id="inputPass" placeholder="Veuillez confirmer votre mot de passe, ici..." required>
      </div>
      <button type="submit" class="button">Créer le compte</button>
    </form>
  </section>
</main>
</body>
</html>