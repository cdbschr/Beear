<?php 
if (isset($_SESSION['id_roles']) && $_SESSION['id_roles'] === 1) {
	require_once 'app/Views/admin/layouts/head.php';
} else {
	header('Location:/app/Views/errors/404.php');
}

header('Refresh: 10; URL=/dashboard.php?action=beers'); ?>

OK