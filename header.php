<?php
	//Clear the output buffer to prevent header issues
    ob_start();
    //Start session if not already started
    if(!session_start())
    	session_start();
	include 'config.php';
    if(isset($_POST['logout']))
		require INCLUDES.'logout.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
		<script src="https://kit.fontawesome.com/922c329282.js" crossorigin="anonymous"></script>

		<!-- Jquery and Popper.Js -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		<!-- Datatables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js">
	</head>
</script>
<body>
	<!-- Nav displays certain elements if user is logged in, not logged in, and if user is admin -->
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2a2a2a;">
	<a class="navbar-brand" href="<?php if(isset($_SESSION['loggedIn'])){echo HTTP.'homepage/emp_page.php';}else{echo HTTP.'index.php';}?>"><i class="fas fa-prescription" style="padding-right: 4px;"></i>EQUINOX</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<?php if(!isset($_SESSION['loggedIn'])):?>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="<?php if(isset($_SESSION['loggedIn'])){echo HTTP.'homepage/emp_page.php';}else{echo HTTP.'index.php';}?>">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo HTTP.'main/help.php'?>">Help</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo HTTP.'main/registration.php'?>">Join</a>
			</li>
		</ul>
		<a href="<?php echo HTTP.'main/login.php'?>"><button class="btn btn-outline-light my-2 my-sm-0" name="login_btn">Employee Login</button></a>
	</div>
	<?php endif; ?>
    <?php if(isset($_SESSION['loggedIn'])):?>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						System Usage
					</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if($_SESSION['userType'] == 'ADMIN'):?>
						<a class="dropdown-item" href="<?php echo HTTP.'homepage/employees/new_employee.php'?>">New Employee</a>
                    <?php endif;?>
					<a class="dropdown-item" href="<?php echo HTTP.'homepage/employees/schedules.php'?>">Schedule</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Transactions
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Previous Transactions</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Inventory
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo HTTP.'homepage/inventory/medication_inventory.php'?>">Medication inventory</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Patient Checkout
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Process Transaction</a>
				</div>
			</li>
		</ul>
		<a href="<?php echo HTTP.'homepage/patients/patient_lookup.php'?>"><button type="button" class="btn btn-outline-light my-2 my-sm-0" style="margin-right: 8px;">Patient Lookup</button></a>
		<a href="<?php echo HTTP.'homepage/patients/new_patient.php'?>"><button type="button" class="btn btn-outline-light my-2 my-sm-0" style="margin-right: 8px;">New Patient</button></a>
		<form class="form-inline my-2 my-lg-0" action="" method="post">
			<div class="form-group">
				<button type="submit" name="logout" class="btn btn-info">LOGOUT</button>
			</div>
		</form>
	</div>
    <?php endif;?>
</nav>

