<?php
if (isset($_SESSION['id_roles']) && $_SESSION['id_roles'] === 2 || $_SESSION['id_roles'] === 1) {
  require_once 'app/Views/admin/layouts/head.php';
} else {
  header('Location:/app/Views/errors/404.php');
}
?>
<main>
  <section class="pres-dashboard">
    <a href="/dashboard.php" class="button return" title="retourner à la page précédente">Retour au Dashboard</a>
    <a href="/?action=deconnexion" class="button deco" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie gestion des bières</h1>
    </div>
  </section>
  <section class="admin-manage container">
    <div class="admin-manage-beers">
        <table>
          <thead>
            <tr>
              <th>Nom de la Bière</th>
              <th>idName</th>
              <th>Date de Création</th>
              <th>Dernière modification</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($beers as $beer): ?>
              <tr>
                <td><?= $beer['name'];?></td>
                <td><?= $beer['idname'];?></td>
                <td><?= $beer['created_date'];?></td>
                <td><?= $beer['modified_date'];?></td>
                <td>
                  <div class="action">
                    <a href="/dashboard.php?action=updateBeer-page&id=<?= $beer['id'];?>" title="modifier la bière">
                    <img class="picto" src="/public/admin/img/pictos/pen.png" alt="modifier">
                    </a>
                    <a href="/dashboard.php?action=deleteBeer-post&id=<?= $beer['id'];?>" title="supprimer la bière">
                      <img class="picto" src="/public/admin/img/pictos/trash.png" alt="supprimer">
                    </a>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
    </div>
  </section>
</main>
</body>
</html>