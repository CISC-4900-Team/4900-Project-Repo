<?php
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">

	<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
</head>
<body>
<!-- navBar -->
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php if(isset($_SESSION['loggedIn'])): ?>
				<a href="https://equinoxpharma.herokuapp.com/homepage/main_page.php" class="navbar-brand"><i class="fas fa-prescription"></i>Equinox</a>
			<?php else: ?>
				<a href="https://equinoxpharma.herokuapp.com/index.php" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>
			<?PHP endif; ?>
		</div>
		<div class="collapse navbar-collapse" id="bs-nav-demo">
			<ul class="nav navbar-nav">
				<?php if(!isset($_SESSION['loggedIn'])): ?>
					<li><a href="https://equinoxpharma.herokuapp.com/pharm_registration.php"><i class="fas fa-users"></i>Join</a></li>
					<li><a href="https://equinoxpharma.herokuapp.com/help.php"><i class="fas fa-question-circle"></i>Help</a></li>
				<?php elseif($_SESSION['userType']=='Admin'): ?>
                    <li><a href="https://equinox-pharma.herokuapp.com/new_employee.php"><i class="fas fa-user-plus"></i>New User</a></li>
				<?php endif; ?>
            <?php if(isset($_SESSION['loggedIn'])): ?>
				<a href="https://equinoxpharma.herokuapp.com/homepage/main_page.php" class="navbar-brand"><i class="fas fa-prescription"></i>Equinox</a>
            <?php else: ?>
				<a href="https://equinoxpharma.herokuapp.com/index.php" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>
            <?PHP endif; ?>
		</div>
		<div class="collapse navbar-collapse" id="bs-nav-demo">
			<ul class="nav navbar-nav">
                <?php
                    if(!isset($_SESSION['loggedIn']))
                    {
                        echo '<li><a href="https://equinoxpharma.herokuapp.com/pharm_registration.php"><i class="fas fa-users"></i>Join</a></li>';
                        echo '<li><a href="https://equinoxpharma.herokuapp.com/help.php"><i class="fas fa-question-circle"></i>Help</a></li>';
                    }
                    else if($_SESSION['userType']=='Admin')
                    {
                        echo '<li><a href="new_employee.php"><i class="fas fa-user-plus"></i>New User</a></li>';
                    }

                ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
                <?php
                    if(isset($_SESSION['loggedIn']))
                    {
                        echo '<li><a href="#"><i class="far fa-id-card"></i></i>PROFILE</a></li>';
                        echo '<li><a href="https://equinoxpharma.herokuapp.com/includes/logout.inc.php"><i class="fas fa-sign-out-alt"></i>LOGOUT</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="https://equinoxpharma.herokuapp.com/user_login.php"><i class="fas fa-sign-in-alt"></i>LOGIN</a></li>';
                    }
                ?>
			</ul>
		</div>
	</div>
</nav>