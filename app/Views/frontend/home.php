<?php
require_once './app/Views/frontend/layouts/head.php';
?>

<main>
  <section id="bieres" class="bieres">
    <?php foreach ($beers as $beer) :?>
    <article id="<?= $beer['idname'] ?>" class="presentationbiere <?= $beer['idname'] ?>">
      <header class="titrebiere">
        <h3><?= $beer['name'] ?></h3>
        <p><?= $beer['hook'] ?> | Alc. <?= $beer['alcdegree'] ?></p>
      </header>
      <img src="/public/frontend/img/verres/Verre-de-bière-<?= $beer['idname'] ?>.png" alt="bière <?= strtolower($beer['name']) ?>" class="verrebiere">
      <a href="/?action=beer-page&id=<?= $beer['id'] ?>" class="button buttonbiere">
        <p>En savoir plus</p>
      </a>
    </article>
    <?php endforeach; ?>
  </section>
  <?php require_once 'layouts/socials.php'; ?>
  <section id="homemap" class="container">
    <header id="cadretxtmap">
      <h3>Où nous retrouver ?</h3>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima expedita veniam repellendus quia, illum quas dignissimos dolorum culpa voluptatum perspiciatis fuga sit eos fugit soluta quae nostrum voluptas quos doloribus.</p>
    </header>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1791.1758235472214!2d-2.288499298800561!3d47.72846252214083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480f95eefde9f4c3%3A0x6e04411b877c8176!2sLanvaux%2C%2056220%20Saint-Grav%C3%A9!5e0!3m2!1sfr!2sfr!4v1637655974536!5m2!1sfr!2sfr" width="1200" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </section>
</main>

<?php require_once './app/Views/frontend/layouts/footer.php'; ?>