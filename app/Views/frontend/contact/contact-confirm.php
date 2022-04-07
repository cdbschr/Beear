<?php include_once './app/Views/frontend/layouts/head.php'; 
header('Refresh: 20; URL=/?action=contact'); ?>

<div class="confirm">
  <h1>Votre mail a été envoyé avec succès !</h1>
  <p>Vous allez être rediriger automatiquement sur le site.</p>

  <a href="/?action=contact">Retourner immédiatement sur le site</a>
</div>

<?php include_once './app/Views/frontend/layouts/footer.php'; ?>