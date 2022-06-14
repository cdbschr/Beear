<?php
if (isset($_SESSION['id_roles']) && $_SESSION['id_roles'] === 2 || $_SESSION['id_roles'] === 1) {
  require_once 'app/Views/admin/layouts/head.php';
} else {
  header('Location:/app/Views/errors/404.php');
}
?>
<main>
  <section class="pres-dashboard">
    <a href="/dashboard.php?action=mails" class="button return" title="retourner à la page précédente">Retour aux Mails</a>
    <a href="/?action=deconnexion" class="button deco" title="deconnexion">Déconnexion</a>
    <div class="container pres-txt-dashboard">
      <h1>Bienvenue sur la partie lecture du mail</h1>
    </div>
  </section>
  <section class="admin-manage container">
    <div class="admin-manage-mails">
      <div class="deleteMail">
        <a href="/dashboard.php?action=deleteMail&id=<?= $mail['id']; ?>" class="button" title="supprimer le mail">
          Supprimer
        </a>
      </div>
      <div class="receive">
        <p>Reçu le : <?= $mail['created_at']; ?></p>
      </div>
      <div class="infomail">
        <p>Nom : <?= strtoupper($mail['lastname']) . " " . $mail['firstname']; ?></p>
      </div>
      <div class="infomail maillast">
        <p>Mail : <?= $mail['mail']; ?></p>
      </div>
      <?php if ($mail['phone'] !== "") : ?>
        <div class="infomail">
          <p>Téléphone : <?= $mail['phone']; ?></p>
        </div>
        <?php else : ?>
      <?php endif; ?>
      <div class="infomail-content">
        <p>Contenu : <?= $mail['content']; ?></p>
      </div>
      <table>
  </section>
</main>
</body>

</html>