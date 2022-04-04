<?php require_once './app/Views/frontend/layouts/head.php'; ?>
<main>
	<div id="contact" class="container">
		<h1>Contact</h1>
		<h4>Vous pouvez nous contacter directement via ce formulaire.</h4>
		<form action="/?action=contactForm" method="post" id="contactform">
			<p><input type="text" placeholder="Nom *" name="lastname" id="nom" value="<?php if(isset($_POST["lastname"])) echo $_POST["lastname"] ?>" required></p>
			<p><input type="text" placeholder="Prénom *" name="firstname" id="prenom" value="<?php if(isset($_POST["firstname"])) echo $_POST["firstname"] ?>" required></p>
			<p><input type="email" placeholder="Adresse email *" name="mail" id="email" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"] ?>" required></p>
			<p><input type="tel" placeholder="Téléphone" name="phone" id="tel" value="<?php if(isset($_POST["phone"])) echo $_POST["phone"] ?>"></p>
			<p><textarea name="content" placeholder="Rédigez votre message ici...*" id="message" rows="10" value="<?php if(isset($_POST["content"])) echo $_POST["content"] ?>" required></textarea></p>
			<p class="contactflex"><input type="checkbox" name="rgpd" id="rgpd" required>autorisation de conservation et utilisation des données *</p>
			<p class="contactflex champoblig">* Champ obligatoire</p>
			<p><button type="submit" id="envoyer" class="button">Envoyer</button></p>
		</form>
	</div>
	<section id="map" class="container">
		<header id="cadretxtmap">
		<h3>Où nous retrouver ?</h3>
		<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima expedita veniam repellendus quia, illum quas dignissimos dolorum culpa voluptatum perspiciatis fuga sit eos fugit soluta quae nostrum voluptas quos doloribus.</p></header>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1791.1758235472214!2d-2.288499298800561!3d47.72846252214083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480f95eefde9f4c3%3A0x6e04411b877c8176!2sLanvaux%2C%2056220%20Saint-Grav%C3%A9!5e0!3m2!1sfr!2sfr!4v1637655974536!5m2!1sfr!2sfr" width="800" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</section>
</main>
<script src="/public/frontend/scripts/contact.js"></script>
<?php require_once './app/Views/frontend/layouts/footer.php'; ?>