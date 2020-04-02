<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php' ?>
<link rel="stylesheet" href="stylesheets/registration_page_style.css">
<title>Join Equinox</title>

<?php
	//Check if form is being submitted
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['emp_pwd'] != $_POST['emp_pwd_confirm'])
        {
            header('location: pharm_registration.php?password_missmatch');
        } else {
            if(isset($_POST['register'])) {
                require 'includes/register.inc.php';
            }
        }
	}
?>
<!-- Registration form -->
<div class="container alerts">
    <?php if(isset($_GET['license_exists'])): ?>
		<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Pharmacy license already in system.</strong><br>
			If you need assistance please contact support.
		</div>
    <?php elseif(isset($_GET['password_missmatch'])): ?>
	    <div class="alert alert-warning alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong>Your passwords must match.</strong>
	    </div>
    <?php elseif(isset($_GET['email_exists'])): ?>
	    <div class="alert alert-danger alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong>User email is already taken.</strong><br>
		    Please use another email address.
	    </div>
    <?php endif; ?>
    <?php if(isset($_GET['register_success'])): ?>
	    <div class="alert alert-success alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong>Registration Successful!</strong><br>
	    </div>
    <?php header('Refresh:10; pharm_registration.php');endif; ?>
</div>
<h1>Join Equinox</h1>
<div class="container form">
	<form action="" method="post">
		<div class="row">
			<div class="col-sm-7">
				<label for="pharm_name">Pharmacy Name</label><br>
				<input type="text" class="form-control input-sm" name="pharm_name" >
			</div>
			<div class="col-sm-5">
				<label for="pharm_license">License Number</label><br>
				<input type="text" class="form-control input-sm" name="pharm_license" >
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label for="pharm_addr">Address</label>
				<input type="text" class="form-control input-sm" name="pharm_addr" >
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5">
				<label for="pharm_city">City</label>
				<input type="text" class="form-control input-sm" name="pharm_city" >
			</div>
			<div class="col-sm-4">
				<label for="pharm_state">State</label>
				<select id="inputState" class="form-control input-sm" name="pharm_state" >
					<option selected>State</option>
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
				<input type="text" class="form-control input-sm" name="pharm_zip" >
			</div>
		</div>

		<div class="row">
			<div class="col-sm-7">
				<label for="pharm_email">Email</label>
				<input type="email" class="form-control input-sm" name="pharm_email" >
			</div>
			<div class="col-sm-5">
				<label for="pharm_phone">Phone</label>
				<input type="text" class="form-control input-sm" name="pharm_phone" >
			</div>
		</div>
		<hr>
		<h3>Manager Information:</h3>
		<div class="row">
			<div class="col-sm-4">
				<label for="emp_first">First Name</label>
				<input type="text" class="form-control input-sm" name="emp_first" >
			</div>
			<div class="col-sm-4">
				<label for="emp_last">Last Name</label>
				<input type="text" class="form-control input-sm" name="emp_last" >
			</div>
			<div class="col-sm-4">
				<label for="emp_license">License Number</label>
				<input type="text" class="form-control input-sm" name="emp_license" >
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label for="emp_addr">Address</label>
				<input type="text" class="form-control input-sm" name="emp_addr" >
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5">
				<label for="emp_city">City</label>
				<input type="text" class="form-control input-sm" name="emp_city" >
			</div>
			<div class="col-sm-4">
				<label for="emp_state">State</label>
				<select id="inputState" class="form-control input-sm" name="emp_state" >
					<option selected>State</option>
                    <?php for($i=0; $i<51; $i++):?>
						<option value="<?php echo $states[$i];?>"> <?php echo $states[$i];?></option>
                    <?php endfor; ?>
				</select>
			</div>
			<div class="col-sm-3">
				<label for="emp_zip">Zipcode</label>
				<input type="text" class="form-control input-sm" name="emp_zip" >
			</div>
		</div>
		<div class="row">
			<div class="col-sm-7">
				<label for="emp_email">Email</label>
				<input type="email" class="form-control input-sm" name="emp_email" >
			</div>
			<div class="col-sm-5">
				<label for="emp_phone">Phone</label>
				<input type="text" class="form-control input-sm" name="emp_phone" >
			</div>
		</div>
		<hr>
		<h3>Create Account Password</h3>
		<div class="row">
			<div class="col-sm-6">
				<label for="emp_pwd">Password</label>
				<input type="password" class="form-control input-sm" name="emp_pwd" >
			</div>
			<div class="col-sm-6">
				<label for="confirm_emp_pwd">Confirm Password</label>
				<input type="password" class="form-control input-sm" name="emp_pwd_confirm" >
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<button type="submit" class="btn btn-primary" name="register">Join Equinox</button>
			</div>
		</div>
	</form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
