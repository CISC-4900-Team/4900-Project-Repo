<?php include_once '../header.php'; ?>

<?php
	if(isset($_POST['request_reset_btn'])) {
        include_once 'includes/password_reset.inc.php';
    }
?>

<link rel="stylesheet" href="css/reset_form.css">
<title>Password Reset</title>
<div class="container header">
	<h1><strong>Password Reset Request</strong></h1>
	<p><strong>Please enter your employee ID and Email Address to reset your password. If you have forgotten your employee ID,
		or Email Address please contact your pharmacy administrator/manager.</strong></p>
</div>
<div class="container reset">
	<form name="reset_request" action="" method="post" autocomplete="off">
		<div class="form-group col-sm-12">
			<label for="emp_id"><strong>Employee ID:</strong></label><br>
			<input type="text" name="emp_id" class="form-control" placeholder="Enter your employee ID" required>
		</div>
		<div class="form-group col-sm-12">
			<label for="emp_email"><strong>E-Mail Address:</strong></label><br>
			<input type="email" name="emp_email" class="form-control" placeholder="Enter your Email Address" required>
		</div>
		<div class="form-group col-sm-12">
			<button type="submit" name="request_reset_btn" class="btn btn-light">Reset Password</button>
		</div>
	</form>
</div>
<?php if(isset($_GET['success'])): ?>
<div class="container alert">
	<div class="alert alert-info" role="alert">
		Password reset instructions have been sent to the registered e-mail
	</div>
</div>
<?php elseif(isset($_GET['failure'])): ?>
	<div class="container alert">
		<div class="alert alert-danger" role="alert">
			E-mail address or employee ID not found, please make sure the e-mail/ID you entered is correct
		</div>
	</div>
<?php endif; ?>
