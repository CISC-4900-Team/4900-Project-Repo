<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php' ?>
<link rel="stylesheet" href="stylesheets/registration_page_style.css">
<title>Join Equinox</title>

<?php
	//Check if form is being submitted
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//Check if passwords match
		if($_POST['password'] == $_POST['confirmpassword'])
		{
		    if(isset($_POST['register']))
		    {
		        require 'includes/register.inc.php';
		    }
		}
	}
?>
<!-- Registration form -->
<div class="container">
	<div id="content">
		<h1>Join Equinox</h1>
		<h3>Pharmacy Information</h3>
		<form name="pharm_reg_form" action="pharm_registration.php" method="post" autocomplete="off">
			<div class="row">
				<div class="form-group col-md-2" id="pharm-name">
					<input type="text" name="pharm_name" placeholder="Pharmacy Name" required>
				</div>
				<div class="form-group col-md-2">
					<input type="text" name="pharm_license" placeholder="Registration Number" required>
				</div>
			</div>
			<div class="row" id="pharm-addr">
				<div class="form-group col-md-2">
					<input type="text" name="pharm_addr" placeholder="Address" required>
				</div>
			</div>
			<div class="row" id="csz-row">
				<div class="form-group col-md-2"  id="csz-city">
					<input type="text" name="pharm_city" placeholder="City" required>
				</div>
				<div class="form-group col-md-2" id="csz-state">
					<input type="text" name="pharm_state" placeholder="State" required>
				</div>
				<div class="form-group col-md-2" id="csz_zip">
					<input type="text" name="pharm_zip" placeholder="Zip Code" required>
				</div>
			</div>
			<div class="row" id="pharm-contact">
				<div class="form-group col-md-2">
					<input type="text" name="pharm_phone" placeholder="Phone Number" required>
				</div>
				<div class="form-group col-md-2">
					<input type="email" name="pharm_email" placeholder="Email" required>
				</div>
			</div>
			<hr>
			<h3>Manager Registration</h3>
			<div class="row" id="mgr-license">
				<div class="form-group col-md-2">
					<label for="pharm_addr">License Number</label>
					<input type="text" name="mgr_license" required>
				</div>
			</div>
			<div class="row" id="mgr-name">
				<div class="form-group col-md-2">
					<label for="mgr_first">First Name</label>
					<input type="text" name="mgr_first" required>
				</div>
				<div class="form-group col-md-2">
					<label for="mgr_last">Last Name</label>
					<input type="text" name="mgr_last" required>
				</div>
			</div>
			<div class="row" id="mgr-addr">
				<div class="form-group col-md-2">
					<label for="mgr_address">Address</label>
					<input type="text" name="mgr_address" required>
				</div>
			</div>
			<div class="row" id="mgr-csz-row">
				<div class="form-group col-md-2"  id="csz-city">
					<label for="mgr_city">City</label>
					<input type="text" name="mgr_city" required>
				</div>
				<div class="form-group col-md-2" id="csz-state">
					<label for="mgr_state">State</label>
					<input type="text" name="mgr_state" required>
				</div>
				<div class="form-group col-md-2" id="csz_zip">
					<label for="mgr_zip">Zip</label>
					<input type="text" name="mgr_zip" required>
				</div>
			</div>
			<div class="row" id="mgr-email">
				<div class="form-group col-md-2">
					<label for="mgr_email">Email</label>
					<input type="email" name="mgr_email" required>
				</div>
			</div>
			<div class="row" id="mgr-name">
				<div class="form-group col-md-2">
					<label for="password">Password</label>
					<input type="password" name="password" required>
				</div>
				<div class="form-group col-md-2">
					<label for="confirmpassword">Confirm Password</label>
					<input type="password" name="confirmpassword" required>
				</div>
			</div>
			<button name="register">Join</button>
		</form>
	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
