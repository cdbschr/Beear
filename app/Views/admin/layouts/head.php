<?php if (!isset($_SESSION['id']))
  throw new Exception("Vous n'êtes pas connecté");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beear, votre ours brasseur dans le Morbihan</title>
  <meta name="description" content="Les meilleures bières du Morbihan, de Bretagne et de France sont ici. Bières blondes, brunes, blanches.">
  <link rel="shortcut icon" href="/public/frontend/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/public/frontend/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/public/styles/style.min.css">
</head>

<body>