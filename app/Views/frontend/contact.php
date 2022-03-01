<?php require_once './app/Views/frontend/layouts/head.php'; ?>
<main>
	<div id="contact" class="container">	
		<h4>Vous pouvez nous contacter directement via ce formulaire.</h4>
		<form action="envoyerform.php" method="post" id="contactform">
			<!-- <div class="radiocivil">
				<p class="contactflex"><span>Civilité</span></p>
				<div class="sepcivilite">
					<input type="radio" name="civilite" id="civilite" value="Mme">
					<label for="civilite">Madame</label>
				</div>
				<div class="sepcivilite">
					<input type="radio" name="civilite" id="civilite" value="M">
					<label for="civilite" class="petit">Monsieur</label>
				</div>
			</div> -->
			<p><input type="text" placeholder="Nom *" name="nom" id="nom" required></p>
			<p><input type="text" placeholder="Prénom *" name="prenom" id="prenom" required></p>
			<p><input type="email" placeholder="Adresse email *" name="email" id="email" required></p>
			<!-- API -->
			<p><input type="text" placeholder="Adresse" name="adresse" id="adresse"></p>
			<div id="adresseApiList" class="">
				<ul id="selectadress"></ul>
			</div>
			<!-- <p><input type="text" placeholder="Code Postal" name="cp" id="cp"></p>
			<p><input type="text" placeholder="Ville" name="ville" id="ville"></p> -->
			<!-- API -->
			<p><input type="tel" placeholder="Téléphone" name="tel" id="tel"></p>
			<p class="contactflex"><label for="message">Votre Message * </label></p>
			<p><textarea name="message" id="message" rows="10" required></textarea></p>
			<p class="contactflex"><input type="checkbox" name="rgpd" id="rgpd" required>autorisation de conservation et utilisation des données *</p>
			<p class="contactflex champoblig">* Champ obligatoire</p>
			<p><button type="submit" id="envoyer" class="button">Envoyer</button></p>
			<div id="validate-send"></div>
		</form>
	</div>
	<section id="map" class="container">
		<header id="cadretxtmap">
		<h3>Où nous retrouver ?</h3>
		<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima expedita veniam repellendus quia, illum quas dignissimos dolorum culpa voluptatum perspiciatis fuga sit eos fugit soluta quae nostrum voluptas quos doloribus.</p></header>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1791.1758235472214!2d-2.288499298800561!3d47.72846252214083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480f95eefde9f4c3%3A0x6e04411b877c8176!2sLanvaux%2C%2056220%20Saint-Grav%C3%A9!5e0!3m2!1sfr!2sfr!4v1637655974536!5m2!1sfr!2sfr" width="800" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</section>
</main>
<script src="scripts/contact.js"></script>
<script src="https://unpkg.com/@supabase/supabase-js"></script>
<script src="scripts/supabase.js"></script>
<?php require_once './app/Views/frontend/layouts/footer.php'; ?>