<footer id="generalfooter" class="container">
  <a href="index.php" id="linklogofooter" title="Accueil"><img src="./public/frontend/img/Logo-Beear.png" id="logofooter" alt="logo Beear"></a>
  <div id="lieu">
    <h4>SIÈGE</h4>
    <adress>
      <p>Lanvaux</p>
      <p>56220 Saint-Gravé</p>
    </adress>
  </div>
  <?php require_once 'socialssvg.php'; ?>
  <div id="linksfooter">
    <a href="/?action=mentionslegales" class="linkfooter" rel="nofollow" title="Mentions légales">
      <p>Mentions légales</p>
    </a>
    <?php if (isset($_SESSION['user'])) : ?>
      <a href="<?= $this->viewAdmin('dashboard') ?>" class="linkfooter" rel="nofollow" title="Accéder au Dashboard">
        <p>Accéder au Dashboard</p>
      </a>
    <?php else : ?>
      <a href="/?action=login" id="buttonlogmenu" class="linkfooter" rel="nofollow" title="Se connecter">
        <p>Se connecter</p>
      </a>
    <?php endif; ?>
    <a href="/?action=rgpd" class="linkfooter" rel="nofollow" title="RGPD">
      <p>RGPD</p>
    </a>
    <a href="#" class="linkfooter" rel="nofollow" title="Plan du site">
      <p>Plan du site</p>
    </a>
  </div>
  <p id="alcoolmoderation">L'abus d'alcool est dangereux pour la santé. À consommer avec modération.</p>
</footer>
<script src="./public/frontend/scripts/navigation.js"></script>
</body>
</html>