<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';
	/*
    if(!isset($_SESSION['loggedIn'])){ //if login in session is not set
        header("Location: 401_unauthorized.php");
    }
	*/
?>

<!-- Index Page Style Sheet -->
<link rel="stylesheet" href="../stylesheets/admin_page_style.css">

<!-- Title -->
<title>Pharmacy Page</title>

<div class="container" >
	<h1>Main Page</h1>
	<div class="row">
		<!-- Patient Lookup  -->
		<div id="Patient_Lookup" class="col-lg-6 col-sm-6">
			<h4>Patient Lookup</h4>
			<button class = "btn btn-dark"><a href="crud/patient_lookup.php">Patient Lookup</a></button>
		</div>
		<!-- Patient Lookup End  -->
		<!-- Recent Patient Transactions -->
		<div id="Patient_Trans" class="col-lg-6 col-sm-6">
			<h4>Recent Patient Transactions</h4>
			<button class = "btn btn-dark">Patient Transactions</button>
		</div>
		<!-- Recent Patient Transactions End -->
		<!-- Employee system usage -->
		<div id="Emp_sys_usage" class="col-lg-6 col-sm-6">
			<h4>Employee system usage</h4>
			<button class = "btn btn-dark">System Usage</button>
		</div>
		<!-- Employee system usage End -->
		<!-- Inventory count  -->
		<div id="Inv_count" class="col-lg-6 col-sm-6">
			<h4>Inventory</h4>
			<button class = "btn btn-dark">Inventory</button>
		</div>
		<!-- Inventory count End -->
		<!-- Daily Employee Schedules    -->
		<div id="Emp_Sch" class="col-lg-6 col-sm-6">
			<h4>Daily Employee Schedules</h4>
			<button class = "btn btn-dark">Schedule</button>
		</div>
		<!-- Daily Employee Schedules End -->
		<!-- Technical Resources  -->
		<div id="Emp_Sch" class="col-lg-6 col-sm-6">
			<h4>Technical Resources</h4>
			<button class = "btn btn-dark">Resources</button>
		</div>
		<!-- Technical Resources  -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
