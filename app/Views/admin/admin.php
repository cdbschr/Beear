<?php
require_once 'app/Views/admin/layouts/head.php';
var_dump($_SESSION);
?>
<main>
  <section class="pres-dashboard">
    <div class="container">
    <a href="/dashboard.php?action=deconnect" class="button" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur le dashboard de Beear</h1>
      <h4>Bonjour <?= ucfirst($_SESSION['pseudo']) ?></h4>
    </div>
    </div>
  </section>
  <?php require_once 'layouts/nav.php'; ?>
</main>
</body>
</html>