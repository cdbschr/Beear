<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
  $dashboardController = new \Beear\Controllers\DashboardController();
  $usersController = new \Beear\Controllers\auth\Users();
  $beersController = new \Beear\Controllers\content\Beers();

  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'beers') {
      $dashboardController->managebeers();
    }

    elseif ($_GET['action'] == 'users') {
      $dashboardController->manageusers();
    }

  } else {
    $dashboardController->admin();
  }
} catch (Exception $e) {
  require 'app/Views/errors/404.php';
} catch(Error $e) {
  eCatcher($e);
  require 'app/Views/errors/oops.php';
}
