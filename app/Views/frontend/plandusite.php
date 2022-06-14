<?php require_once './app/Views/frontend/layouts/head.php'; ?>

<main id="sitemap" class="container">
<h1>Plan du site</h1>
<ul>
	<li><a href="/">Accueil</a></li>
	<li><a href="/#bblonde">Produits</a></li>
	<ul class="sitemaptabulation">
		<li><a href="/?action=beer-page&id=1">Beear Blonde</a></li>
		<li><a href="/?action=beer-page&id=1">Beear Brune</a></li>
		<li><a href="/?action=beer-page&id=1">Beear Blanche</a></li>
	</ul>
	<li><a href="/?action=valeurs">Valeurs</a></li>
	<li><a href="/?action=contact">Contact</a></li>
	<li><a href="/?action=mentions-legales">Mentions légales</a></li>
	<li><a href="/?action=rgpd">RGPD</a></li>
	<li><a href="/?action=plan-site">Plan du site</a></li>
</ul>
</main>
<?php require_once './app/Views/frontend/layouts/footer.php'; ?>