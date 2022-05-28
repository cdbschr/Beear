<nav class="container">
  <ul class="dashboardmenu">
    <li><a href="/" title="Accueil" class="button">Accueil</a></li>
    <li><a href="/dashboard.php?action=beers" title="Gestion des bières" class="button">Gestion des bières</a></li>
    <!-- faire une boucle php pour afficher cette partie seulement aux utilisateurs étant éditeurs ou administrateurs -->
    <?php ?>
    <li><a href="dashboard.php?action=users" title="Utilisateurs" class="button">Utilisateurs</a></li>
  </ul>
</nav>