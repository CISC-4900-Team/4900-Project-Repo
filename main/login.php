<?php include_once '../header.php'; ?>

<?php
	//Check if form is being submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    	//Check if button was pressed
		if(isset($_POST['login'])) {
		    require INCLUDES.'login.inc.php';
		}
    }
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
<?php if(isset($_GET['error'])): ?>
	<div class="container alert">
	<?php if($_GET['error'] == 'account_unverified'): ?>
		<div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Your account is not yet verified. Please check your email for the verification link</strong>
		</div>
	<?php endif; ?>
	<?php if($_GET['error'] == 'not_found'): ?>
		<div class="container alert">
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Account not found. Make sure the employee ID is correct</strong>
			</div>
		</div>
	<?php endif; ?>
    <?php if($_GET['error'] == 'wrongpassword'): ?>
		<div class="container alert">
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Password entered was incorrect</strong>
			</div>
		</div>
    <?php endif; ?>
	</div>
<?php endif; ?>