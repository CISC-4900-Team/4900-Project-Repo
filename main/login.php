<?php include_once '../header.php'; ?>

<?php
	//Check if form is being submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    	//Check if button was pressed
		if(isset($_POST['login']))
		    require INCLUDES.'login.inc.php';
?>

<link rel="stylesheet" href="css/login.css">
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
			<label for="password">Password:</label><br>
			<input type="password" name="password" class="form-control" id="password" placeholder="**********" required>
		</div>
		<div class="form-group col-sm-12">
			<button type="submit" name="login" class="btn btn-light">Login</button>
		</div>
		<div class="form-group col-sm-12">
			<a href="reset_password.php">Forgot ID/Password?</a>
		</div>
	</form>
</div>

<?php include 'messages/login_messages.php';

