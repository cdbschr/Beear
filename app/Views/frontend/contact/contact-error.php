<?php include_once './app/Views/frontend/layouts/head.php'; 
header('Refresh: 30; URL=/?action=contact'); ?>

<div class="rejected">
  <h1>Votre mail n'a pas malheureusement pas été envoyé, vous pouvez réessayer en cliquant sur le lien ci-dessous.</h1>

  <a href="/?action=contact">Retourner immédiatement sur le site</a>
</div>

<?php include_once './app/Views/frontend/layouts/footer.php'; ?>