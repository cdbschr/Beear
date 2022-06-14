<nav class="container">
  <ul class="dashboardmenu">
    <li><a href="/" title="Accueil" class="button">Accueil</a></li>
    <?php if ($_SESSION['id_roles'] === 1 || $_SESSION['id_roles'] === 2) : ?>
    <li><a href="/dashboard.php?action=mails" title="Gestion des bières" class="button">Gestion des mails</a></li>
    <li><a href="/dashboard.php?action=beers" title="Gestion des bières" class="button">Gestion des bières</a></li>
    <!-- condition pour afficher cette partie seulement aux utilisateurs étant administrateurs -->
    <?php if ($_SESSION['id_roles'] === 1) : ?>
    <li><a href="dashboard.php?action=users" title="Utilisateurs" class="button">
    <?php if ($count['nb'] <= 1) : ?>
      (<?= $count['nb'] ?>) Utilisateur
    <?php else: ?>
      (<?= $count['nb'] ?>) Utilisateurs
    <?php endif; ?>
    </a></li>
    <?php endif; endif; ?>
  </ul>
</nav>