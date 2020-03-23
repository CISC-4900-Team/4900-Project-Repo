<?php
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
	require('dbinfo.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
</head>
<body>
<!-- navBar -->
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-nav-demo">
			<ul class="nav navbar-nav">
				<li class="<?= ($activePage == 'index') ? 'active':''; ?>"><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
				<li class="<?= ($activePage == 'pharm_registration') ? 'active':''; ?>"><a href="pharm_registration.php"><i class="fas fa-users"></i>Join</a></li>
				<li class="<?= ($activePage == 'help') ? 'active':''; ?>"><a href="#"><i class="fas fa-question-circle"></i>Help</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!-- <li class="<?= ($activePage == 'admin_login') ? 'active':''; ?>"><a href="admin_login.php"><i class="fas fa-user-cog"></i>Admin Login</a></li> -->
				<li class="<?= ($activePage == 'user_login') ? 'active':''; ?>"><a href="user_login.php"><i class="fas fa-user-plus"></i>User Login</a></li>
			</ul>
		</div>
	</div>
</nav>