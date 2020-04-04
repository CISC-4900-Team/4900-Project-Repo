<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_emp.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <title>Employee Main Page</title>
</head>
<body>
<!-- navBar -->
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <a href="#" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-nav-demo">
            <ul class="nav navbar-nav">
                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="#"><i class="fas fa-question-circle"></i>Help</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Side Bar -->
<div class="sidenav">
  <a href="#">Welcome 'userID'</a>
  <a href="#">"Last Login Time"</a>
  <a href="#">Other Locations</a>
  <a href="#">Contact</a>
</div>

<!-- main structure -->
<div class="container">
	<h1>Main Page</h1>
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
			<h4>Employee system usage</h4>
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
<!-- Technical Resources  -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>