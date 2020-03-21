<?php
	session_start();
	$_SESSION['message'] = '';

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
<!-- Nav Include -->
<?php  include('includes/header.inc.php'); ?>

<!-- Pharmacy Registration Page Style Sheet -->

<!-- Title -->
<title>Join Equinox</title>

<!-- Required Information - Pharmacy name, address, city, state, zip, phone number -->
<!-- Right below the pharmacy information will be the manager registration separated by line and header -->
<!-- Manager Registration info - First Name, Last Name, Phone Number, Email, Password -->
<div class="container">
	<form name="pharm_reg_form" action="pharm_registration.php" method="post" autocomplete="off">
		<h3>Pharmacy Information</h3>
		<input type="text" name="pharm_license" placeholder="Pharmacy License Number" required><br>
		<input type="text" name="pharm_name" placeholder="Pharmacy Name" required><br>
		<input type="text" name="pharm_addr" placeholder="Pharmacy Address" required><br>
		<input type="text" name="pharm_city" placeholder="City" required>
		<input type="text" name="pharm_state" placeholder="State" required>
		<input type="text" name="pharm_zip" placeholder="Zip Code" required><br>
		<input type="text" name="pharm_phone" placeholder="Phone Number" required>
		<input type="email" name="pharm_email" placeholder="Pharmacy Email" required>
		<hr>
		<h3>Manager Information</h3>
		<input type="text" name="mgr_license" placeholder="Pharmacist License Number" required><br>
		<input type="text" name="mgr_first" placeholder="First Name" required>
		<input type="text" name="mgr_last" placeholder="Last Name" required><br>
		<input type="text" name="mgr_address" placeholder="Address" required><br>
		<input type="text" name="mgr_city" placeholder="City" required>
		<input type="text" name="mgr_state" placeholder="State" required>
		<input type="text" name="mgr_zip" placeholder="Zip Code" required><br>
		<input type="email" name="mgr_email" placeholder="Email" required><br>
		<input type="password" name="password" placeholder="Password" required><br>
		<input type="password" name="confirmpassword" placeholder="Confirm Password" required><br>
		<button name="register">Register</button>
	</form>
</div>
