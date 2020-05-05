<?php include_once '../header.php'; ?>
<?php
	//Check if form is being submitted
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
        if(isset($_POST['register']))
        {
            require_once '../includes/register.inc.php';
        }
	}
?>

<link rel="stylesheet" href="css/registration.css">
<title>Join Equinox</title>
<div class="container form">
	<h1>Join Equinox</h1>
	<div class="card">
		<form action="" method="post" name="registration_form">
			<div id="pharmacyForm">
				<h3>Pharmacy Information</h3>
				<div class="row" style="display: block;">
					<div class="col">
						<label for="pharm_name">Pharmacy Name</label>
						<input type="text"
						       class="form-control input-sm"
						       name="pharm_name"
						       id="pharmName"
						       pattern="[a-zA-Z-\s]+"
						       title="No symbols, numbers or special characters, except hypens and spaces" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<label for="pharm_addr">Address</label>
						<input type="text"
						       class="form-control input-sm"
						       name="pharm_addr"
						       id="pharmAddr"
						       pattern="[a-zA-Z0-9-\s]+"
						       title="Only letters, numbers, and hyphens" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label for="pharm_city">City</label>
						<input type="text"
						       class="form-control input-sm"
						       name="pharm_city"
						       id="pharmCity"
						       pattern="[a-zA-Z\s]+"
						       title="No symbols, numbers or special characters" required>
					</div>
					<div class="col">
						<label for="pharm_state">State</label>
						<select id="inputState" class="form-control input-sm" name="pharm_state" required>
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
						       id="pharmZip"
						       pattern="[0-9]{5}"
						       title="5 Digit Zipcode"
						       value="<?php if(isset($_POST['pharm_zip']))echo $_POST['pharm_zip'];?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-7">
						<label for="pharm_email">Email</label>
						<input type="email"
						       class="form-control input-sm"
						       name="pharm_email"
						       id="pharmEmail" required>
					</div>
					<div class="col-sm-5">
						<label for="phone">Phone</label>
						<input type="tel"
						       class="form-control input-sm"
						       name="pharm_phone"
						       id="pharmPhone"
						       placeholder="123-555-1234"
						       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
						       title="Phone number must match the following pattern: 000-000-0000" required>
					</div>
				</div>
				<button type="button" class="btn btn-primary" id="continueButton">Continue</button>
				<h6 id="contMsg" style="text-align: center; margin-top: 8px; color: red; display: none;">Please fill in all the fields</h6>
			</div>

			<div id="adminForm" style="display: none;">
				<h3>Manager Information</h3>
				<div class="row">
					<div class="col-sm-4">
						<label for="emp_first">First Name</label>
						<input type="text"
						       class="form-control input-sm"
						       name="emp_first"
						       id="empFirst"
						       pattern="[a-zA-Z-]+"
						       title="No symbols, numbers or special characters, except hyphens" required>
					</div>
					<div class="col-sm-4">
						<label for="emp_last">Last Name</label>
						<input type="text"
						       class="form-control input-sm"
						       name="emp_last"
						       id="empLast"
						       pattern="[a-zA-Z-]+"
						       title="No symbols, numbers or special characters, except hyphens" required>
					</div>
					<div class="col-sm-4">
						<label for="emp_license">License Number</label>
						<input type="text"
						       class="form-control input-sm"
						       name="emp_license"
						       id="empLicense"
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
						       id="empAddr"
						       pattern="[a-zA-Z0-9-\s]+"
						       title="Only letters, numbers, and hyphens" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label for="emp_city">City</label>
						<input type="text"
						       class="form-control input-sm"
						       name="emp_city"
						       id="empCity"
						       pattern="[a-zA-Z\s]+"
						       title="No symbols, numbers or special characters" required>
					</div>
					<div class="col">
						<label for="emp_state">State</label>
						<select id="inputState" class="form-control input-sm" name="emp_state" required>
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
						       id="empZip"
						       pattern="[0-9]{5}"
						       title="5 Digit Zipcode" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-7">
						<label for="emp_email">Email</label>
						<input type="email"
						       class="form-control input-sm"
						       name="emp_email"
						       id="empEmail" required>
					</div>
					<div class="col-sm-5">
						<label for="emp_phone">Phone</label>
						<input type="text"
						       class="form-control input-sm"
						       name="emp_phone"
						       id="empPhone"
						       placeholder="123-555-1234"
						       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
						       title="Phone number must match the following patten: 000-000-0000" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label for="emp_pwd">Password</label>
						<input type="password"
						       class="form-control input-sm"
						       name="emp_pwd"
						       id="password"
						       pattern="^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\s:])([^\s]){8,}$"
						       title="Must be at least 8 characters, including 1 number, 1 uppercase, and 1 lowercase" required>
						<h6 id="message1" class="form-text text-muted">Must be at least 8 characters, including 1 number, 1 uppercase, and 1 lowercase</h6>
					</div>
					<div class="col-sm-6">
						<label for="confirm_emp_pwd">Confirm Password</label>
						<input type="password"
						       class="form-control input-sm"
						       name="emp_pwd_confirm"
						       id="confirmPassword"
						       pattern="^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\s:])([^\s]){8,}$"
						       title="Both passwords must match and meet the required conditions" required>
						<h6 id="message2" class="form-text text-muted">Both passwords must match and meet the required conditions</h6>

					</div>
				</div>
				<div class="row">
					<div class="col-3 text-center">
						<button type="button" class="btn btn-light" id="backBtn">Back</button>
					</div>
					<div class="col text-center">
						<button type="submit" class="btn btn-primary" name="register" id="registerBtn"><strong>Join Equinox</strong></button>
					</div>
				</div>
				<h6 id="registerMsg" style="text-align: center; margin-top: 8px; color: red; display: none;">Please complete the entire form to register</h6>
			</div>
		</form>
	</div>
    <?php include 'messages/register_messages.php'; ?>
	<script src="js/form_control.js"></script>
</div>

