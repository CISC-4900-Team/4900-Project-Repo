<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="main_emp.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">
	<script src="main_emp.js"></script>
<!-- BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/922c329282.js" crossorigin="anonymous"></script>
    <title>Employee Main Page</title>
</head>
<body>

<!-- navBar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="#" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a></li>
            <li class="nav-item active"><a class="nav-link" href="#">Help <span class="sr-only">(current)</span></a></li>
        </ul>
  </div>
</nav>

<!-- side bar -->
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">UserID:</a>
        <a href="#">Previous Login:</a>
        <a href="#">Location info:</a>
        <a href="#">Contact:</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">&#9776; Information</button>
</div>

<!-- main structure -->
<div class="container">
        <h1>Equinox</h1>
	<div class="row">
		<!-- Patient Lookup  -->
		<div id="Patient_Lookup" class="col-lg-6 col-sm-6">
			<h4>Patient Lookup</h4>
            <button type="button" class = "btn btn-dark btn-lg">Patient Lookup</button></a>
		</div>
		<!-- Patient Lookup End  -->
		<!-- Recent Patient Transactions -->
		<div id="Patient_Trans" class="col-lg-6 col-sm-6">
			<h4>Recent Patient Transactions</h4>
			<button type="button" class = "btn btn-dark btn-lg">Patient Transactions</button>
		</div>
		<!-- Recent Patient Transactions End -->
		<!-- Employee system usage -->
	    <div id="Emp_sys_usage" class="col-lg-6 col-sm-6">
            <h4>System Usage</h4>
			<button type="button" class = "btn btn-dark btn-lg">System Usage</button>
		</div>
		<!-- Employee system usage End -->
		<!-- Inventory count  -->
		<div id="Inv_count" class="col-lg-6 col-sm-6">
			<h4>Inventory</h4>
			<button type="button" class = "btn btn-dark btn-lg">Inventory</button></a>
		</div>
		<!-- Inventory count End -->
		<!-- Daily Employee Schedules -->
		<div id="Emp_Sch" class="col-lg-6 col-sm-6">
			<h4>Daily Employee Schedules</h4>
			<button type="button" class = "btn btn-dark btn-lg">Schedule</button>
		</div>
		<!-- Daily Employee Schedules End -->
		<!-- Technical Resources  -->
		<div id="Emp_Sch" class="col-lg-6 col-sm-6">
			<h4>Technical Resources</h4>
			<button type="button" class = "btn btn-dark btn-lg">Resources</button>
		</div>
	</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>