<?php
if ($_SESSION['id_roles'] === 1) {
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
      <h1>Bienvenue sur la partie GESTION DES UTILISATEURS</h1>
    </div>
  </section>
  <section class="admin-manage container">
    <a class="button db" href="/dashboard.php?action=addUser-page" title="ajouter un utilisateur">Ajouter un utilisateur</a>
    <div class="admin-manage-users">
        <table>
          <thead>
            <tr>
              <th>Pseudo</th>
              <th>Email</th>
              <th>Rôle</th>
              <th>Date de Création</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($users as $user): ?>
              <tr>
                <td><?= $user['pseudo']; ?></td>
                <td><?= $user['mail']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['date']; ?></td>
                <td>
                  <div class="action">
                    <a href="/dashboard.php?action=updateUser-page&id=<?= $user['id']; ?>" title="modifier l'utilisateur">
                    <img class="picto" src="/public/admin/img/pictos/pen.png" alt="modifier">
                    </a>
                    <a href="/dashboard.php?action=deleteUser&id=<?= $user['id']; ?>" title="supprimer l'utilisateur">
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