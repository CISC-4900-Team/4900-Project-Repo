<?php include
    $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';
    include("{$_SERVER['DOCUMENT_ROOT']}/includes/patientSchema.inc.php");

    //Check if form is being submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['add_patient']))
        {
            require '../../includes/crud_includes/addpatient.inc.php';
        }
    }
?>
<link rel="stylesheet" href="../../stylesheets/crud_styles/add_patient_style.css">
<title>New Patient</title>
<div class="container">
	<a href="patient_lookup.php"><button>Back</button></a>
	<h1>New Patient</h1>
	<hr>
	<form action="" method="post">
		<h3>Patient Information</h3>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="p_first">First Name</label>
				<input type="text" name="p_first" required>
			</div>
			<div class="form-group col-md-2">
				<label for="p_last">Last Name</label>
				<input type="text" name="p_last" required>
			</div>
			<div class="form-group col-md-2">
				<label for="p_dob">Date of Birth</label>
				<input type="date" name="p_dob" required>
			</div>
			<div class="form-group col-md-2">
				<label for="p_dob" required>Sex</label><br>
				<label class="radio-inline"><input type="radio" name="optradio" value="M">M</label>
				<label class="radio-inline"><input type="radio" name="optradio" value="F">F</label>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-3">
				<label for="p_addr">Patient Address</label>
				<input type="text" name="p_addr" size="40" required>
			</div>
			<div class="form-group col-md-2">
				<label for="p_city">City</label>
				<input type="text" name="p_city" required>
			</div>
			<div class="form-group col-md-2">
				<label for="p_state">State</label>
				<input type="text" name="p_state" required>
			</div>
			<div class="form-group col-md-1">
				<label for="p_zip">Zipcode</label>
				<input type="text" name="p_zip" size="5" required>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-1">
				<label for="p_allergies">Allergies</label>
				<input type="text" name="p_allergies" size="120" required>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-2">
				<label for="p_phone_1">Primary Phone</label>
				<input type="text" name="p_phone_1" required>
			</div>
			<div class="form-group col-md-2">
				<label for="p_phone_2">Secondary Phone</label>
				<input type="text" name="p_phone_2">
			</div>

			<div class="form-group col-md-1">
				<label for="p_email">Email</label>
				<input type="text" name="p_email" size="48">
			</div>
		</div>
	<hr>
		<h3>Insurance Information</h3>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="p_insurer">Insurer</label>
				<input type="text" name="p_insurer" size="32" required>
			</div>
			<div class="form-group col-md-2">
				<label for="p_ins_id">Insurance ID</label>
				<input type="text" name="p_ins_id" size="32">
			</div>
		</div>
	<hr>
		<h3>Primary Care Physician</h3>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="pcp_name">PCP Name</label>
				<input type="text" name="pcp_name" size="25" required>
			</div>
			<div class="form-group col-md-4">
				<label for="pcp_addr">PCP Office Address</label>
				<input type="text" name="pcp_addr" size="55" required>
			</div>
			<div class="form-group col-md-2">
				<label for="pcp_phone">PCP Phone</label>
				<input type="text" name="pcp_phone" size="25" required>
			</div>
		</div>
		<button name="add_patient">Add New Patient</button>
	</form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
