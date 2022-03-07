<?php 
include_once 'layouts/head.php';
require_once 'classes/newBeers.php';
?>

<main id="biereblanche" class="bieres container">
	<section class="presbiere">
		<img src="./img/verres/Verre-de-bière-<?= $beears->beears[2]->getId(); ?>.png" alt="biere <?= $beears->beears[2]->getName(); ?>">
		<div class="grouppresbiere">
			<div class="detailbiere">
				<div class="titrebiere">
					<h1><?= $beears->beears[2]->getName(); ?></h1>
					<h4><?= $beears->beears[2]->getsecName(); ?></h4>
				</div>
				<p><?= $beears->beears[2]->getDesc(); ?></p>
			</div>
			<div class="explicationbiere">
				<div id="type">
					<h6>Blanche</h6>
					<p>Type</p>
				</div>
				<div id="niveau-alcool">
					<h6><?= $beears->beears[2]->getAlcDegree(); ?>%</h6>
					<p>alc./vol</p>
				</div>
				<div id="ibu">
					<h6><?= $beears->beears[2]->getIbu(); ?></h6>
					<p>IBU</p>
				</div>
				<div id="degre">
					<h6><?= $beears->beears[2]->getTemp(); ?></h6>
					<p>Dégustation</p>
				</div>
			</div>
		</div>
	</section>
	<section id="vsg">
		<div class="vsg">
			<div class="pictotitre"><img src="./img/pictos/voyez.png" alt="picto voyez beear">
				<h3>Voyez</h3>
			</div>
			<p><?= $beears->beears[2]->getVoyez(); ?></p>
		</div>
		<div class="vsg">
			<div class="pictotitre"><img src="./img/pictos/sentez.png" alt="picto sentez beear">
				<h3>Sentez</h3>
			</div>
			<p><?= $beears->beears[2]->getSentez(); ?></p>
		</div>
		<div class="vsg">
			<div class="pictotitre"><img src="./img/pictos/goutez.png" alt="picto goutez beear">
				<h3>Goutez</h3>
			</div>
			<p><?= $beears->beears[2]->getGoutez(); ?></p>
		</div>
	</section>
	<section id="biereplus">
		<a href="<?= $beears->beears[1]->getId(); ?>.php">
			<div class="biereplus">
				<h2><?= $beears->beears[1]->getName(); ?></h2>
				<img src="./img/verres/Verre-de-bière-<?= $beears->beears[1]->getId(); ?>.png" alt="biere <?= $beears->beears[1]->getName(); ?>">
			</div>
		</a>
		<a href="<?= $beears->beears[0]->getId(); ?>.php">
			<div class="biereplus">
				<h2><?= $beears->beears[0]->getName(); ?></h2>
				<img src="./img/verres/Verre-de-bière-<?= $beears->beears[0]->getId(); ?>.png" alt="biere <?= $beears->beears[0]->getName(); ?>">
			</div>
		</a>
	</section>
</main>
<?php include_once './layouts/footer.php'; ?>