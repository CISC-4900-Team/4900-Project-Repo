<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/header.inc.php'; ?>
<link rel="stylesheet" href="../stylesheets/admin_page_style.css">
<title>Pharmacy Page</title>

<?php
	/*
    if(!isset($_SESSION['loggedIn'])){ //if login in session is not set
        header("Location: 401_unauthorized.php");
    }
	*/
?>

<div class="container">
	<h1>Main Page</h1>
	<div class="row">
		<!-- Patient Lookup  -->
		<div id="Patient_Lookup" class="col-lg-6 col-sm-6">
			<h4>Patient Lookup</h4>
			<a href="patients/patient_lookup.php"><button class = "btn btn-dark">Patient Lookup</button></a>
		</div>
		<!-- Patient Lookup End  -->
		<!-- Recent Patient Transactions -->
		<div id="Patient_Trans" class="col-lg-6 col-sm-6">
			<h4>Recent Patient Transactions</h4>
			<button class = "btn btn-dark">Patient Transactions</button>
		</div>
		<!-- Recent Patient Transactions End -->
		<!-- Employee system usage -->
		<?php if($_SESSION['userType']=='Admin'): ?>
	        <div id="Emp_sys_usage" class="col-lg-6 col-sm-6">
			<h4>Employee system usage</h4>
			<button class = "btn btn-dark">System Usage</button>
			</div>
		<?php endif; ?>
		<!-- Employee system usage End -->
		<!-- Inventory count  -->
		<div id="Inv_count" class="col-lg-6 col-sm-6">
			<h4>Inventory</h4>
			<a href="inventory/current_inventory.php"><button class = "btn btn-dark">Inventory</button></a>
		</div>
		<!-- Inventory count End -->
		<!-- Daily Employee Schedules -->
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
	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
