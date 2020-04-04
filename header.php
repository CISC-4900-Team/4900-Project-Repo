<?php
    session_start();
    include_once 'config.php';
    if(isset($_POST['logout'])) {
		require 'includes/logout.inc.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<li><a class="navbar-brand" href="<?php if(isset($_SESSION['loggedIn'])){echo HTTP.'homepage/main_page.php';}else{echo HTTP.'index.php';}?>"><i class="fas fa-prescription"></i>EQUINOX</a></li>
		</div>

		<ul class="nav navbar-nav">
            <?php if(!isset($_SESSION['loggedIn'])): ?>
	            <li><a href="<?php echo HTTP.'registration.php'?>">SIGN UP</a></li>
	            <li><a href="<?php echo HTTP.'help.php'?>">HELP</a></li>
            <?php endif; ?>
		</ul>

		<ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['loggedIn'])): ?>
	            <li><a href="#"><i class="fas fa-user"></i>PROFILE</a></li>
				<form class="navbar-form navbar-right" action="" method="post">
					<div class="form-group">
						<button type="submit" name="logout" class="btn btn-info">LOGOUT</button>
					</div>
				</form>
            <?php else: ?>
	            <li><a href="<?php echo HTTP.'login.php'?>"><i class="fas fa-sign-in-alt"></i>LOGIN</a></li>
            <?php endif; ?>
		</ul>
	</div>
</nav>