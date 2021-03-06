<!-- Appel du header -->
<?php require_once './app/Views/frontend/layouts/head.php'; ?>
<!-- Page contact -->
<main id="contactpage" class="container">
  <h1>Contact</h1>
  <h4>Vous pouvez nous contacter directement via ce formulaire.</h4>
  <section id="contactsection">
    <div id="contact" class="container">
      <!-- Formulaire de contact dont on récupère les informations dans le dashboard -->
      <form action="/?action=post-contactform" method="post" id="contactform">
        <p>
          <label for="nom">Votre nom <span>*</span></label>
          <input type="text" placeholder="Nom *" name="lastname" id="nom" value="<?php if (isset($_POST["lastname"])) echo htmlspecialchars($_POST["lastname"]) ?>" required>
        </p>
        <p>
          <label for="prenom">Votre prénom <span>*</span></label>
          <input type="text" placeholder="Prénom *" name="firstname" id="prenom" value="<?php if (isset($_POST["firstname"])) echo htmlspecialchars($_POST["firstname"]) ?>" required>
        </p>
        <p>
          <label for="email">Votre email <span>*</span></label>
          <input type="email" placeholder="Adresse email *" name="mail" id="email" value="<?php if (isset($_POST["mail"])) echo htmlspecialchars($_POST["mail"]) ?>" required>
        </p>
        <p>
          <label for="tel">Votre téléphone</label>
          <input type="tel" placeholder="Téléphone" name="phone" id="tel" value="<?php if (isset($_POST["phone"])) echo htmlspecialchars($_POST["phone"]) ?>">
        </p>
        <p>
          <label for="content">Votre message <span>*</span></label>
          <textarea id="content" name="content" placeholder="Rédigez votre message ici...*" rows="10" required><?php if (isset($_POST["content"])) echo htmlspecialchars($_POST["content"]) ?></textarea>
        </p>
        <p class="contactflex"><input type="checkbox" name="rgpd" id="rgpd" required>autorisation de conservation et utilisation des données *</p>
        <p class="contactflex champoblig">* Champ obligatoire</p>
        <p class="pbutton"><button type="submit" id="envoyer" class="button">Envoyer</button></p>
      </form>
    </div>
    <!-- Carte pour situer -->
    <aside id="map" class="container">
      <header id="cadretxtmap">
        <h3>Où nous retrouver ?</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima expedita veniam repellendus quia, illum quas dignissimos dolorum culpa voluptatum perspiciatis fuga sit eos fugit soluta quae nostrum voluptas quos doloribus.</p>
      </header>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1791.1758235472214!2d-2.288499298800561!3d47.72846252214083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480f95eefde9f4c3%3A0x6e04411b877c8176!2sLanvaux%2C%2056220%20Saint-Grav%C3%A9!5e0!3m2!1sfr!2sfr!4v1637655974536!5m2!1sfr!2sfr" width="800" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </aside>
  </section>
</main>
<!-- Appel du footer -->
<?php require_once './app/Views/frontend/layouts/footer.php'; ?>