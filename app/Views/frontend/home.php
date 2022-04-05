<?php
require_once './app/Views/frontend/layouts/head.php';
?>

<main>
  <article id="articles" class="container">
    <h2>Actualités</h2>
    <h4>Pour Noel, jeu concours incroyable</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptatem necessitatibus pariatur quam dignissimos, accusantium voluptate aspernatur vero laudantium ad aperiam eum sint? Facilis sed delectus enim? Aperiam placeat maiores aspernatur pariatur culpa molestias accusantium ullam voluptatibus rem, quis qui sint incidunt, debitis, natus fugit?</p>
    <img src="/public/frontend/img/actualites/jeuconcours.jpg" alt="jeu concours">
    <a href="/?action=actus" class="flex-button">
      <p class="button">En savoir plus</p>
    </a>
  </article>
  <section id="bieres" class="bieres">

  </section>
  <?php require_once 'layouts/socials.php'; ?>
  <section id="map" class="container">
    <header id="cadretxtmap">
      <h3>Où nous retrouver ?</h3>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima expedita veniam repellendus quia, illum quas dignissimos dolorum culpa voluptatum perspiciatis fuga sit eos fugit soluta quae nostrum voluptas quos doloribus.</p>
    </header>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1791.1758235472214!2d-2.288499298800561!3d47.72846252214083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480f95eefde9f4c3%3A0x6e04411b877c8176!2sLanvaux%2C%2056220%20Saint-Grav%C3%A9!5e0!3m2!1sfr!2sfr!4v1637655974536!5m2!1sfr!2sfr" width="800" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </section>
</main>

<?php require_once './app/Views/frontend/layouts/footer.php'; ?>