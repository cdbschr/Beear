<?php require_once './app/Views/frontend/layouts/head.php'; ?> 

<main>
  <h1>Page de création de compte</h1>
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
    <button type="submit" class="button">Créer mon compte</button>
  </form>
</main>

<?php require_once './app/Views/frontend/layouts/footer.php'; ?>