<?php require_once './app/Views/frontend/layouts/head.php'; ?> 

<main id="login" class="container">
  <h1>Page de Connexion</h1>
<form method="post" action="/?action=login-post">
  <div class="form-group">
    <label for="mail">Mail</label>
    <input type="email" class="form-control" name="mail" id="loginEmail" aria-describedby="emailHelp" placeholder="E-mail">
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" name="password" id="loginPassword" placeholder="Mot de passe">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
</main>

<?php require_once './app/Views/frontend/layouts/footer.php'; ?>