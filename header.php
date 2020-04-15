<?php
    session_start();
    include_once 'config.php';
    if(isset($_POST['logout'])) {
		require INCLUDES.'logout.inc.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">
	<script src="../includes/main_emp.js"></script>
	<!-- BootStrap -->
	<script src="https://kit.fontawesome.com/922c329282.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2a2a2a;">
	<a class="navbar-brand" href="<?php if(isset($_SESSION['loggedIn'])){echo HTTP.'homepage/emp_page.php';}else{echo HTTP.'index.php';}?>"><i class="fas fa-prescription" style="padding-right: 4px;"></i>EQUINOX</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<?php if(!isset($_SESSION['loggedIn'])): ?>
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
	<?php else: ?>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
            <?php if($_SESSION['userType'] == 'Admin'):?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					System Usage
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">System Info</a>
					<a class="dropdown-item" href="<?php echo HTTP.'homepage/employees/schedules.php'?>">Employee Schedule</a>
					<a class="dropdown-item" href="#">User Profile</a>
					<a class="dropdown-item" href="#">Admin Settings</a>
			</li>
            <?php endif;?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Transactions
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Previous Transactions</a>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Inventory
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo HTTP.'homepage/inventory/medication_inventory.php'?>">Medication inventory</a>
					<a class="dropdown-item" href="<?php echo HTTP.'homepage/inventory/product_inventory.php'?>">Product inventory</a>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Patient Checkout
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Process Transaction</a>
			</li>

		</ul>

		<a href="<?php echo HTTP.'homepage/patients/patient_lookup.php'?>"><button type="button" class="btn btn-outline-light my-2 my-sm-0">Patient Lookup</button></a>
		<a href="<?php echo HTTP.'homepage/patients/new_patient.php'?>"><button type="button" class="btn btn-outline-light my-2 my-sm-0">New Patient</button></a>

		<?php if($_SESSION['userType'] == 'Admin'):?>
			<a href="<?php echo HTTP.'homepage/new_employee.php'?>"><button type="button" class="btn btn-outline-light my-2 my-sm-0" name="new_emp_button">New Employee</button></a>
        <?php endif;?>

		<form class="form-inline my-2 my-lg-0" action="" method="post">
			<div class="form-group">
				<button type="submit" name="logout" class="btn btn-info">LOGOUT</button>
			</div>
		</form>
	</div>
    <?php endif; ?>
</nav>

