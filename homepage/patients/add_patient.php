<?php include_once '../../header.php'; ?>
<link rel="stylesheet" href="../../stylesheets/crud_styles/add_patient_style.css">
<title>New Patient</title>

<?php
    //Check if form is being submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_patient'])) {
            require '../../includes/addpatient.inc.php';
        }
    }
?>

<div class="container">
	<a href="patient_lookup.php"><button>Back</button></a>
	<h1>New Patient</h1>
	<hr>
	<form action="" method="post">
		<h3>Patient Information</h3>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="p_first">First Name</label>
				<input type="text" name="p_first" >
			</div>
			<div class="form-group col-md-2">
				<label for="p_last">Last Name</label>
				<input type="text" name="p_last" >
			</div>
			<div class="form-group col-md-2">
				<label for="p_dob">Date of Birth</label>
				<input type="date" name="p_dob" >
			</div>
			<div class="form-group col-md-2">
				<label for="p_dob" >Sex</label><br>
				<label class="radio-inline"><input type="radio" name="optradio" value="M" checked>M</label>
				<label class="radio-inline"><input type="radio" name="optradio" value="F">F</label>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-3">
				<label for="p_addr">Patient Address</label>
				<input type="text" name="p_addr" size="40" >
			</div>
			<div class="form-group col-md-2">
				<label for="p_city">City</label>
				<input type="text" name="p_city" >
			</div>
			<div class="form-group col-md-2">
				<label for="p_state">State</label>
				<select id="inputState" class="form-control input-sm" name="p_state">
					<option>State</option>
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
			<div class="form-group col-md-1">
				<label for="p_zip">Zipcode</label>
				<input type="text" name="p_zip" size="5" >
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-1">
				<label for="p_allergies">Allergies</label>
				<input type="text" name="p_allergies" size="120" >
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-2">
				<label for="p_phone1">Primary Phone</label>
				<input type="text" name="p_phone1" >
			</div>
			<div class="form-group col-md-2">
				<label for="p_phone2">Secondary Phone</label>
				<input type="text" name="p_phone2" placeholder="Optional">
			</div>

			<div class="form-group col-md-1">
				<label for="p_email">Email</label>
				<input type="text" name="p_email" size="48" placeholder="Optional">
			</div>
		</div>
	<hr>
		<h3>Insurance Information</h3>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="p_insurer">Insurer</label>
				<input type="text" name="p_insurer" size="32" >
			</div>
			<div class="form-group col-md-2">
				<label for="p_ins_id">Insurance ID</label>
				<input type="text" name="p_ins_id" size="32" >
			</div>
		</div>
	<hr>
		<h3>Primary Care Physician</h3>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="pcp_name">PCP Name</label>
				<input type="text" name="pcp_name" size="25" >
			</div>
			<div class="form-group col-md-4">
				<label for="pcp_addr">PCP Office Address</label>
				<input type="text" name="pcp_addr" size="55" >
			</div>
			<div class="form-group col-md-2">
				<label for="pcp_phone">PCP Phone</label>
				<input type="text" name="pcp_phone" size="25" >
			</div>
		</div>
		<button name="add_patient">Add New Patient</button>
	</form>
</div>

<?php include_once '../../footer.php'; ?>
