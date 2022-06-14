<!-- Appel du header -->
<?php require_once './app/Views/frontend/layouts/head.php'; ?>
<!-- Présentation des bières -->
<main class="container">
  <section class="presbiere">
    <img src="<?= $beer['img'] ?>" alt="biere <?= strtolower($beer['name']); ?>">
    <div class="grouppresbiere">
      <div class="detailbiere">
        <div class="titrebiere">
          <h1><?= $beer['name']; ?></h1>
          <h4><?= $beer['hook']; ?></h4>
        </div>
        <p><?= $beer['desc']; ?></p>
      </div>
      <div class="explicationbiere">
        <div id="type">
          <h6><?= $beer['name'] ?></h6>
          <p>Type</p>
        </div>
        <div id="niveau-alcool">
          <h6><?= $beer['alcdegree']; ?>%</h6>
          <p>alc./vol</p>
        </div>
        <div id="ibu">
          <h6><?= $beer['ibu']; ?></h6>
          <p>IBU</p>
        </div>
        <div id="degre">
          <h6><?= $beer['temp']; ?></h6>
          <p>Dégustation</p>
        </div>
      </div>
    </div>
  </section>
  <section id="vsg">
    <div class="vsg">
      <div class="pictotitre"><img src="/public/frontend/img/pictos/voyez.png" alt="picto voyez beear">
        <h3>Voyez</h3>
      </div>
      <p><?= $beer['voyez']; ?></p>
    </div>
    <div class="vsg">
      <div class="pictotitre"><img src="/public/frontend/img/pictos/sentez.png" alt="picto sentez beear">
        <h3>Sentez</h3>
      </div>
      <p><?= $beer['sentez']; ?></p>
    </div>
    <div class="vsg">
      <div class="pictotitre"><img src="/public/frontend/img/pictos/goutez.png" alt="picto goutez beear">
        <h3>Goutez</h3>
      </div>
      <p><?= $beer['goutez']; ?></p>
    </div>
  </section>
</main>
<!-- Appel du footer -->
<?php require_once './app/Views/frontend/layouts/footer.php'; ?>