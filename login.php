<?php include_once 'header.php'; ?>

<?php
	//Check if form is being submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    	//Check if button was pressed
		if(isset($_POST['login'])) {
		    require 'includes/login.inc.php';
		}
    }
?>

<link rel="stylesheet" href="stylesheets/login_style.css">
<title>Employee Login</title>
<div class="container my-h1">
	<h1>Employee Login</h1>
</div>
<div class="container login">
	<form name="user_login" action="login.php" method="post" autocomplete="off">
		<div class="form-group col-sm-12">
			<label for="emp_id">Employee ID:</label><br>
			<input type="text" name="emp_id" class="form-control" id="user-id" required>
		</div>
		<div class="form-group col-sm-12">
			<label for="pharm_id">Pharmacy ID:</label><br>
			<input type="text" name="pharm_id" class="form-control" id="company-id" required>
		</div>
		<div class="form-group col-sm-12">
			<label for="password">Password:</label><br>
			<input type="password" name="password" class="form-control" id="password" placeholder="**********" required>
		</div>
		<div class="form-group col-sm-12">
			<button type="input" name="login" class="btn btn-light">Login</button>
		</div>
		<div class="form-group col-sm-12">
			<a href="#">Forgot ID/Password?</a>
		</div>
	</form>
</div>

<?php include_once 'footer.php'; ?>