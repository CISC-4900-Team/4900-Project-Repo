<?php include_once '../header.php'; ?>
<?php
	//Check if form is being submitted
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
        if(isset($_POST['register']))
        {
            require_once 'includes/register.inc.php';
        }
	}
?>

<link rel="stylesheet" href="css/registration.css">
<title>Join Equinox</title>
<div class="container form">
<?php if(isset($_GET['error'])): ?>
    <?php if($_GET['error'] == 'pharm_license_exists'): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Pharmacy license already exists in the system. Make sure the license you entered is correct
				or contact Equinox support team for assistance.</strong>
		</div>
    <?php endif; ?>
    <?php if($_GET['error'] == 'pharm_email_exists'): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Pharmacy e-mail already exists in the system. Make sure the pharmacy email you entered is correct
				or contact Equinox support team for assistance.</strong>
		</div>
    <?php endif; ?>
    <?php if($_GET['error'] == 'manager_license_exists'): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>The manager license already exists in the system. Make sure the license number you entered is correct
				or contact Equinox support team for assistance.</strong>
		</div>
    <?php endif; ?>
    <?php if($_GET['error'] == 'manager_email_exists'): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>The manager e-mail already exists in the system. Make sure the e-mail you entered is correct
				or contact Equinox support team for assistance.</strong>
		</div>
    <?php endif; ?>
<?php endif; ?>

	<form action="" method="post" onSubmit="return checkPassword(this)">
		<div class="row">
			<div class="col-sm-7">
				<label for="pharm_name">Pharmacy Name</label>
				<input type="text"
				       class="form-control input-sm"
				       name="pharm_name"
				       pattern="[a-zA-Z-]+"
				       title="No symbols, numbers or special characters, except hypens and spaces" required>

			</div>
			<div class="col-sm-5">
				<label for="pharm_license">License Number</label>
				<input type="text"
				       class="form-control input-sm"
				       name="pharm_license"
				       pattern="[a-zA-Z0-9-]+"
				       title="Only letters, numbers, and hyphens" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label for="pharm_addr">Address</label>
				<input type="text"
				       class="form-control input-sm"
				       name="pharm_addr"
				       pattern="[a-zA-Z0-9-\s]+"
				       title="Only letters, numbers, and hyphens" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5">
				<label for="pharm_city">City</label>
				<input type="text"
				       class="form-control input-sm"
				       name="pharm_city"
				       pattern="[a-zA-Z\s]+"
				       title="No symbols, numbers or special characters" required>
			</div>
			<div class="col-sm-4">
				<label for="pharm_state">State</label>
				<select id="inputState" class="form-control input-sm" name="pharm_state" required>
					<option selected><?php if(isset($_SESSION['form_data'])){echo $_SESSION['form_data'][4];}else{echo 'State';}?></option>
                    <?php
                        $states = array("AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC", "DE", "FL", "GA", "HI",
                            "IA", "ID", "IL", "IN", "KS", "KY", "LA", "MA", "MD", "ME", "MI", "MN", "MO", "MS",
                            "MT", "NC", "ND", "NE", "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC",
                            "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY");

                        for($i=0; $i<51; $i++):?>
							<option value="<?php echo $states[$i];?>"> <?php echo $states[$i];?></option>
                        <?php endfor; ?>
				</select>
			</div>
			<div class="col-sm-3">
				<label for="pharm_zip">Zipcode</label>
				<input type="text"
				       name="pharm_zip"
				       class="form-control input-sm"
				       pattern="[0-9]{5}"
				       title="5 Digit Zipcode" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-7">
				<label for="pharm_email">Email</label>
				<input type="email"
				       class="form-control input-sm"
				       name="pharm_email" required>
			</div>
			<div class="col-sm-5">
				<label for="phone">Phone</label>
				<input type="tel"
				       class="form-control input-sm"
				       name="pharm_phone"
				       placeholder="123-555-1234"
				       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
				       title="Phone number must match the following pattern: 000-000-0000" required>
			</div>
		</div>
		<hr>
		<h3><strong>Manager Information:</strong></h3>
		<div class="row">
			<div class="col-sm-4">
				<label for="emp_first">First Name</label>
				<input type="text"
				       class="form-control input-sm"
				       name="emp_first"
				       pattern="[a-zA-Z-]+"
				       title="No symbols, numbers or special characters, except hyphens" required>
			</div>
			<div class="col-sm-4">
				<label for="emp_last">Last Name</label>
				<input type="text"
				       class="form-control input-sm"
				       name="emp_last"
				       pattern="[a-zA-Z-]+"
				       title="No symbols, numbers or special characters, except hyphens" required>
			</div>
			<div class="col-sm-4">
				<label for="emp_license">License Number</label>
				<input type="text"
				       class="form-control input-sm"
				       name="emp_license"
				       pattern="[a-zA-Z0-9-]+"
				       title="Only letters, numbers, and hyphens" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label for="emp_addr">Address</label>
				<input type="text"
				       class="form-control input-sm"
				       name="emp_addr"
				       pattern="[a-zA-Z0-9-\s]+"
				       title="Only letters, numbers, and hyphens" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5">
				<label for="emp_city">City</label>
				<input type="text"
				       class="form-control input-sm"
				       name="emp_city"
				       pattern="[a-zA-Z\s]+"
				       title="No symbols, numbers or special characters" required>
			</div>
			<div class="col-sm-4">
				<label for="emp_state">State</label>
				<select id="inputState" class="form-control input-sm" name="emp_state" required>
					<option selected>State</option>
                    <?php for($i=0; $i<51; $i++):?>
						<option value="<?php echo $states[$i];?>"> <?php echo $states[$i];?></option>
                    <?php endfor; ?>
				</select>
			</div>
			<div class="col-sm-3">
				<label for="emp_zip">Zipcode</label>
				<input type="text"
				       class="form-control input-sm"
				       name="emp_zip"
				       pattern="[0-9]{5}"
				       title="5 Digit Zipcode" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-7">
				<label for="emp_email">Email</label>
				<input type="email"
				       class="form-control input-sm"
				       name="emp_email" required>
			</div>
			<div class="col-sm-5">
				<label for="emp_phone">Phone</label>
				<input type="text"
				       class="form-control input-sm"
				       name="emp_phone"
				       placeholder="123-555-1234"
				       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
				       title="Phone number must match the following patten: 000-000-0000" required>
			</div>
		</div>
		<h3><strong>Manager Account Password:</strong></h3>
		<div class="row">
			<div class="col-sm-6">
				<label for="emp_pwd">Password</label>
				<input type="password"
				       class="form-control input-sm"
				       name="emp_pwd"
				       pattern=".{8,}"
				       title="Password must be a minimum of eight characters" required>
			</div>
			<div class="col-sm-6">
				<label for="confirm_emp_pwd">Confirm Password</label>
				<input type="password"
				       class="form-control input-sm"
				       name="emp_pwd_confirm"
				       pattern=".{8,}"
				       title="Password must be a minimum of eight characters" required>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<button type="submit" class="btn btn-primary" name="register">Join Equinox</button>
			</div>
		</div>
	</form>
</div>
