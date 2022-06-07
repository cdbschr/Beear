<?php 
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
	require_once 'app/Views/admin/layouts/header.php';
} else {
	header('Location:/app/Views/errors/404.php');
}

header('Refresh: 10; URL=/dashboard.php?action=users'); ?>

OK