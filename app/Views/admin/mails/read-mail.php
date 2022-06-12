<?php
if (isset($_SESSION['id_roles']) && $_SESSION['id_roles'] === 2 || $_SESSION['id_roles'] === 1) {
  require_once 'app/Views/admin/layouts/head.php';
} else {
  header('Location:/app/Views/errors/404.php');
}
?>
<main>
  <section class="pres-dashboard">
    <a href="/?action=deconnexion" class="button" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie lecture d'un mail</h1>
    </div>
  </section>
  <section class="admin-manage container">
    <div class="admin-manage-mails">
        <table>
          <thead>
            <tr>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Mail</th>
              <th>Téléphone</th>
              <th>Contenu</th>
              <th>Reçu le</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td><?= $mail['firstname'];?></td>
                <td><?= $mail['lastname'];?></td>
                <td><?= $mail['mail'];?></td>
                <td><?= $mail['phone'];?></td>
                <td><?= $mail['content'];?></td>
                <td><?= $mail['created_at'];?></td>
                <td>
                  <div class="action">
                    <a href="/dashboard.php?action=deleteMail-post&id=<?= $mail['id'];?>" title="supprimer le mail">
                      <img class="picto" src="/public/admin/img/pictos/trash.png" alt="supprimer">
                    </a>
                  </div>
                </td>
              </tr>
          </tbody>
        </table>
    </div>
  </section>
</main>
</body>
</html>