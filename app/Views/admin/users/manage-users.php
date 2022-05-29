<?php
require_once 'app/Views/admin/layouts/head.php';
?>

<main>
  <section class="pres-dashboard">
    <div class="container">
    <a href="/?action=deconnexion" class="button" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie GESTION DES UTILISATEURS</h1>
    </div>
    </div>
  </section>
  <section class="admin-manage container">
    <a class="button db" href="/dashboard.php?action=addUser-page" title="ajouter un utilisateur">Ajouter un utilisateur</a>
    <div class="admin-manage-users">
        <table>
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>Rôle</th>
              <th>Date de Création</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- <?php //foreach ($data['users'] as $user): ?>
              <tr>
                <td><?php // $user->lastname; ?></td>
                <td><?php // $user->firstname; ?></td>
                <td><?php // $user->email; ?></td>
                <td><?php // $user->role; ?></td>
                <td><?php // $user->created_at; ?></td>
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