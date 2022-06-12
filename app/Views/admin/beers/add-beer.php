<?php
if (isset($_SESSION['id_roles']) && $_SESSION['id_roles'] === 2 || $_SESSION['id_roles'] === 1) {
  require_once 'app/Views/admin/layouts/head.php';
} else {
  header('Location:/app/Views/errors/404.php');
}
?>
<main>
  <section class="pres-dashboard">
    <a href="/?action=deconnexion" class="button" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie ajout d'une bière</h1>
    </div>
  </section>
  <section class="container">
    <form method="POST" id="create-beer" action="dashboard.php?action=addBeer-post">
      <?php if(isset($e)):
        if ($e) :
         foreach($e as $error): ?>
          <p class="error"><?= $e ?></p>
      <?php endforeach; endif; endif; ?>
    <div class="form-group">
      <label for="input-pseudo">Nom de la bière</label>
      <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])) echo htmlspecialchars($_POST['name'])?>" placeholder="Saisissez le nom de la bière..." required>
    </div>
    <div class="form-group">
      <label for="input-hook">Phrase d'accroche</label>
      <input type="text" class="form-control" name="hook" value="<?php if(isset($_POST['hook'])) echo htmlspecialchars($_POST['hook'])?>" placeholder="Saisissez la phrase d'accroche" required>
    </div>
    <div class="form-group">
      <label for="input-alcdegree">Degré d'alcool</label>
      <input type="text" class="form-control" name="alcdegree" value="<?php if(isset($_POST['alcdegree'])) echo htmlspecialchars($_POST['alcdegree'])?>" placeholder="Saisissez le degré d'alcool de la bière" required>
    </div>
    <div class="form-group">
      <label for="input-desc">Description</label>
      <textarea name="desc" cols="25" rows="8" value="<?php if(isset($_POST['desc'])) echo htmlspecialchars($_POST['desc'])?>" placeholder="Saisissez la longue description de la bière" required></textarea>
    </div>
    <div class="form-group">
      <label for="input-ibu">IBU</label>
      <input type="text" class="form-control" name="ibu" value="<?php if(isset($_POST['ibu'])) echo htmlspecialchars($_POST['ibu'])?>" placeholder="Saisissez l'IBU (mesure qui évalue l'amertume) de la bière" required>
    </div>
    <div class="form-group">
      <label for="input-temp">Température</label>
      <input type="text" class="form-control" name="temp" value="<?php if(isset($_POST['temp'])) echo htmlspecialchars($_POST['temp'])?>" placeholder="Saisissez la température idéale de dégustation" required>
    </div>
    <div class="form-group">
      <label for="input-voyez">Voyez</label>
      <textarea name="voyez" cols="25" rows="8" value="<?php if(isset($_POST['voyez'])) echo htmlspecialchars($_POST['voyez'])?>" placeholder="Décrivez le visuel de la bière fraichement versée" required></textarea>
    </div>
    <div class="form-group">
      <label for="input-sentez">Sentez</label>
      <textarea name="sentez" cols="25" rows="8" value="<?php if(isset($_POST['sentez'])) echo htmlspecialchars($_POST['sentez'])?>" placeholder="Décrivez l'odeur de la bière fraichement versée" required></textarea>
    </div>
    <div class="form-group">
      <label for="input-goutez">Goutez</label>
      <textarea name="goutez" cols="25" rows="8" value="<?php if(isset($_POST['goutez'])) echo htmlspecialchars($_POST['goutez'])?>" placeholder="Décrivez le goût de la bière fraichement versée" required></textarea>
    </div>
    <div class="form-group">
      <label for="input-image">Image</label>
      <input type="file" class="form-control" name="image"> 
      <button type="submit" class="button">Créer la bière</button>
    </form>
  </section>
</main>
</body>
</html>