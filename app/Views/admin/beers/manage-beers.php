<?php
if (isset($_SESSION['id_roles']) && $_SESSION['id_roles'] === 2 || $_SESSION['id_roles'] === 1) {
  require_once 'app/Views/admin/layouts/head.php';
} else {
  header('Location:/app/Views/errors/404.php');
}
?>
<main>
  <section class="pres-dashboard">
    <div class="container">
    <a href="/?action=deconnexion" class="button" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie gestion des bières</h1>
    </div>
    </div>
  </section>
  <section class="admin-manage container">
    <div><a class="button db" href="/dashboard.php?action=addBeer-page" title="ajouter un utilisateur">Ajouter une bière</a></div>
    <div class="admin-manage-users">
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
                <td><?= $beer['name']; ?></td>
                <td><?= $beer['idname']; ?></td>
                <td><?= $beer['created_date']; ?></td>
                <td><?= $beer['modified_date']; ?></td>
                <td>
                  <a href="/dashboard.php?action=updateBeer-page&id=<?= $beer['id']; ?>" title="modifier l'utilisateur">
                    UPDATE
                  </a>
                  <a href="/dashboard.php?action=deleteBeer-post&id=<?= $beer['id']; ?>" title="supprimer l'utilisateur">
                    DELETE
                  </a>
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