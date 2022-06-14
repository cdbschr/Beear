<!-- Footer -->
<footer id="generalfooter" class="container">
  <a href="/" id="linklogofooter" title="Accueil"><img src="./public/frontend/img/Logo-Beear.png" id="logofooter" alt="logo Beear"></a>
  <div id="lieu">
    <h4>SIÈGE</h4>
    <address>
      <p>Lanvaux</p>
      <p>56220 Saint-Gravé</p>
    </address>
  </div>
  <!-- Appel des logos des réseaux sociaux en SVG -->
  <?php require_once 'socialssvg.php'; ?>
  <div id="linksfooter">
    <a href="/?action=mentionslegales" class="linkfooter" rel="nofollow" title="Mentions légales">
      <p>Mentions légales</p>
    </a>
    <!-- Connexion avec condition dans le cas où c'est déjà connecté -->
    <?php if (isset($_SESSION['mail'])) : ?>
      <a href="/dashboard.php" class="linkfooter" rel="nofollow" title="Accéder au Dashboard">
        <p>Dashboard</p>
      </a>
    <?php else : ?>
      <a href="/?action=login-page" id="buttonlogmenu" class="linkfooter" rel="nofollow" title="Se connecter">
        <p>Se connecter</p>
      </a>
    <?php endif; ?>
    <a href="/?action=rgpd" class="linkfooter" rel="nofollow" title="RGPD">
      <p>RGPD</p>
    </a>
    <a href="/?action=plan-site" class="linkfooter" rel="nofollow" title="Plan du site">
      <p>Plan du site</p>
    </a>
  </div>
  <!-- Phrase évidemment très petite pour illustrer les publicités actuelles où le texte sur la modération est très petit et passe très vite -->
  <p id="alcoolmoderation">L'abus d'alcool est dangereux pour la santé. À consommer avec modération.</p>
</footer>
<!-- Scripts js -->
<script src="./public/frontend/scripts/navigation.js"></script>
</body>
</html>