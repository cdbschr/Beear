<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
  $dashboardController = new \Beear\Controllers\DashboardController();

  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'valeurs') {
      $frontController->valeursPage();
    }
  } else {
    $dashboardController->admin();
  }
} catch (Exception $e) {
  require 'app/Views/errors/404.php';
}
