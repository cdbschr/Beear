<?php
require_once 'app/Views/admin/layouts/head.php';
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
              <th>idName</th>
              <th>Nom de la Bière</th>
              <th>Date de Création</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- <?php //foreach ($data['beers'] as $beer): ?>
              <tr>
                <td><?php // $beer->idname; ?></td>
                <td><?php // $beer->name; ?></td>
                <td><?php // $beer->created_at; ?></td>
                <td>
                  <a href="<?php //$router->generate('admin_user_edit', ['id' => $user->id]); ?>" class="button">Modifier</a>
                  <a href="<?php //$router->generate('admin_user_delete', ['id' => $user->id]); ?>" class="button">Supprimer</a> -->
                <!-- </td>
              </tr> -->
            <?php // endforeach; ?>
          </tbody>
        </table>
    </div>
  </section>
</main>
</body>
</html>