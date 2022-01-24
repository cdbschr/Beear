<?php require_once './layouts/head.php'; ?>
<main class="container">
	<article id="articles">
		<h2>À GAGNER 1 DESSOUS DE VERRE COLLECTOR BEEAR PAR TIRAGE AU SORT</h2>
		<h4>Comment participer ?</h4>
		<h5>Etape 1</h5>
		<p>Acheter 1 produit de la gamme BEEAR parmi les références suivantes : <a href="index.php#bblonde" class="linkactus">BEEAR BLONDE</a>,<a href="index.php#bbrune" class="linkactus"> BEEAR BRUNE</a>,<a href="index.php#bblanche" class="linkactus"> BEEAR BLANCHE</a> en 3×33 cl ou 75 cl dans un magasin participant à l’opération.</p>
		<p>Vous pouvez également retrouver <a href="valeurs.php" class="linkactus">LES VALEURS DE L'ENTREPRISE</a> , ainsi que <a href="index.php#bblonde" class="linkactus">NOS PRODUITS.</a> </p>
		<img src="./img/actualites/jeuconcours.jpg" alt="jeu concours">
		<h5>Etape 2</h5>
		<p>S’inscrire au jeu en remplissant le formulaire ci-dessous et en chargeant sa preuve d’achat (original du ticket de caisse avec le libellé des produits et la date entre le 01/09/2021 et le 30/11/2021 entourés).</p>
		<p>En cas de réclamation, vous pouvez directement nous contacter via notre formulaire sur la page <a href="contact.php" class="linkactus">CONTACT</a>.</p>
	</article>
	<div id="formjeuconcours">
		<form action="envoyerformphp" method="post">
			<div class="radiocivil">
				<p class="contactflex"><span>Civilité</span></p>
				<div class="sepcivilite">
					<input type="radio" name="civilite" id="civilite" value="Mme">
					<label for="civilite">Madame</label>
				</div>
				<div class="sepcivilite">
					<input type="radio" name="civilite" id="civilite" value="M">
					<label for="civilite" class="petit">Monsieur</label>
				</div>
			</div>
			<p><input type="text" placeholder="Nom *" name="nom" id="nom" required></p>
			<p><input type="text" placeholder="Prénom *" name="prenom" id="prenom" required></p>
			<p><input type="email" placeholder="Adresse email *" name="email" id="email" required></p>
			<!-- Récupérer api adresse du gouv : https://adresse.data.gouv.fr/api-doc/adresse et faire comme l'exercice pokemon -->
			<p><input type="text" placeholder="Adresse" name="adresse" id="adresse"></p>
			<p><input type="text" placeholder="Code Postal" name="cp" id="cp"></p>
			<p><input type="text" placeholder="Ville" name="ville" id="ville"></p>
			<!-- Récupérer api adresse du gouv : https://adresse.data.gouv.fr/api-doc/adresse et faire comme l'exercice pokemon -->
			<p><input type="tel" placeholder="Téléphone" name="tel" id="tel"></p>
			<p><select name="biere" id="biere-selection">
					<option value="">-- Selectionner une bière --</option>
					<option value="blonde">Beear Blonde</option>
					<option value="brune">Beear Brune</option>
					<option value="blanche">Beear Blanche</option>
				</select></p>
			<p class="contactflex"><label for="message">Votre Message * </label></p>
			<p><textarea name="message" id="message" rows="10" required></textarea></p>
			<p class="contactflex"><input type="checkbox" name="rgpd" id="rgpd" required>autorisation de conservation et utilisation des données *</p>
			<p class="contactflex champoblig">* Champ obligatoire</p>
			<div id="selectionfichier">
				<input type="file" name="jeu" id="filejeu">
				<p class="champoblig">Taille max. des fichiers : 128 MB.</p>
			</div>
			<p><input type="submit" id="envoyer" class="button" value="Envoyer"></p>
		</form>
	</div>
	<div id="socials">
		<h2 id="socialsh2">N'oubliez pas de suivre toute l'actualité de la brasserie Beear sur les réseaux sociaux :</h2>
		<a href="https://facebook.com" class="flex-button">
			<p class="button">Facebook</p>
		</a>
		<a href="https://instagram.com" class="flex-button">
			<p class="button">Instagram</p>
		</a>
		<a href="https://twitter.com" class="flex-button">
			<p class="button">Twitter</p>
		</a>
	</div>
</main>
<?php require_once './layouts/footer.php'; ?>