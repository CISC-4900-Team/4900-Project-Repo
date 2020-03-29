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
			<?php
                if(isset($_SESSION['loggedIn']))
				{
                    echo '<a href="http://localhost:63342/PharmaSystem/homepage/main_page.php" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>';
				}
                else
                {
                	echo '<a href="http://localhost:63342/PharmaSystem/index.php" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>';
                }
			?>
		</div>
		<div class="collapse navbar-collapse" id="bs-nav-demo">
			<ul class="nav navbar-nav">
				<?php
                    if(!isset($_SESSION['loggedIn']))
					{
						echo '<li class="<?= ($activePage == \'pharm_registration\') ? \'active\':\'\'; ?>"><a href="http://localhost:63342/PharmaSystem/pharm_registration.php"><i class="fas fa-users"></i>Join</a></li>';
						echo '<li class="<?= ($activePage == \'help\') ? \'active\':\'\'; ?>"><a href="http://localhost:63342/PharmaSystem/help.php"><i class="fas fa-question-circle"></i>Help</a></li>';
					}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
					if(isset($_SESSION['loggedIn']))
					{
						echo '<li><a href="http://localhost:63342/PharmaSystem/includes/logout.inc.php"><i class="fas fa-sign-out-alt"></i>LOGOUT</a></li>';
					}
					else
					{
						echo '<li class="<?= ($activePage == \'user_login\') ? \'active\':\'\'; ?>"><a href="http://localhost:63342/PharmaSystem/user_login.php"><i class="fas fa-sign-in-alt"></i>LOGIN</a></li>';
					}
				?>
			</ul>
		</div>
	</div>
</nav>