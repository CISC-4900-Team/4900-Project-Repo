<?php include_once '../../header.php'; ?>
<?php
    $p_record = null;
    if(isset($_GET['pid']))
    {
        //get the patient information
        $patientID = $_GET['pid'];
        $sql = "SELECT * FROM patients WHERE p_id = ?";
        $stmt = mysqli_stmt_init($mySQLI);
        if(mysqli_stmt_prepare($stmt, $sql))
        {
            mysqli_stmt_bind_param($stmt, 's', $patientID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }
        $p_record = mysqli_fetch_array($result);

        //getting patient insurance information
        $sql = "SELECT * FROM insurance WHERE policy_number = ".$p_record['insurance_id'];
        $insResult = mysqli_query($mySQLI, $sql);
        if($insResult->num_rows > 0)
            $insurance = mysqli_fetch_array($insResult);
        else
        {
        	$insurance['insurance_name'] = 'NA';
            $insurance['policy_number'] = '00000000';
            $insurance['deductible']  = '0';
            $insurance['start_date']  = '';
            $insurance['exp_date']  = '';
        }
    }
    if(isset($_POST['updateButton']))
    	require_once 'includes/updatepatient.inc.php';

    $states = array("AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC", "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS",
                    "KY", "LA", "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE", "NH", "NJ", "NM", "NV",
                    "NY", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY");
?>

<link rel="stylesheet" href="css/new_patient.css">
<title>New Patient</title>
<div class="container">
	<div class="card card-outline-secondary">
		<div class="card-header">
			<h3 class="mb-0">New Patient</h3>
			<p>* = Required</p>
		</div>
		<form autocomplete="off" name="new_patient" action="" method="post">
			<div class="card-body">
				<div class="form-group row">
					<label class="col-lg-2 col-form-label form-control-label">First Name *</label>
					<div class="col-lg-4">
						<input type="text"
						       class="form-control"
						       name="p_first"
						       value="<?php echo $p_record['patient_first']; ?>"
						       pattern="[a-zA-Z-]+"
						       title="No symbols, numbers or special characters, except hypens"
						       placeholder="Jane">
					</div>
					<label class="col-lg-2 col-form-label form-control-label">Last Name *</label>
					<div class="col-lg-4">
						<input type="text"
						       class="form-control"
						       name="p_last"
						       value="<?php echo $p_record['patient_last']; ?>"
						       pattern="[a-zA-Z-]+"
						       title="No symbols, numbers or special characters, except hypens"
						       placeholder="Doe">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 col-form-label form-control-label">Date of Birth*</label>
					<div class="col-lg-4">
						<input type="date"
						       class="form-control"
						       name="p_dob"
						       value="<?php echo $p_record['dob']; ?>">
					</div>
					<label class="col-lg-3 col-form-label form-control-label">Sex *</label>
					<div class="form-check-inline col-lg-1">
						<input type="radio"
						       class="form-check-input"
						       name="p_sex"
						       value="M"<?php if($p_record['sex']=='M')echo 'checked';?>>
						<label class="form-check-label">Male</label>
					</div>
					<div class="form-check-inline col-lg-1">
						<input type="radio"
						       class="form-check-input"
						       name="p_sex"
						       value="F"<?php if($p_record['sex']=='F')echo 'checked';?>>
						<label class="form-check-label">Female</label>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 col-form-label form-control-label">Address *</label>
					<div class="col-lg-4">
						<input type="text"
						       class="form-control"
						       name="p_addr"
						       value="<?php echo $p_record['p_addr']; ?>"
						       pattern="[a-zA-Z0-9-\s.]+"
						       title="Only letters, numbers, and hyphens" >
					</div>
					<label class="col-lg-2 col-form-label form-control-label">City *</label>
					<div class="col-lg-4">
						<input type="text"
						       class="form-control"
						       name="p_city"
						       value="<?php echo $p_record['p_city']; ?>"
						       pattern="[a-zA-Z\s]+"
						       title="No symbols, numbers or special characters" >
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 col-form-label form-control-label">State *</label>
					<div class="col-lg-4">
						<select class="form-control" name="p_state">
                            <option value="<?php echo $p_record['p_state']; ?>"><?php echo $p_record['p_state']; ?></option>
                            <?php
                                for($i=0;$i<50;$i++):?>
									<option value="<?php echo "$states[$i]"?>"><?php echo "$states[$i]"?></option>
                                <?php endfor; ?>
						</select>
					</div>
					<label class="col-lg-2 col-form-label form-control-label">Zip *</label>
					<div class="col-lg-4">
						<input type="text"
						       class="form-control"
						       name="p_zip"
						       value="<?php echo $p_record['p_zip']; ?>"
						       pattern="[0-9]{5}"
						       title="5 Digit Zipcode"
						       placeholder="12345">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 col-form-label form-control-label">Allergies *</label>
					<div class="col-lg-10">
						<input type="text"
						       class="form-control"
						       name="p_allergies"
						       value="<?php echo $p_record['allergies']; ?>"
						       pattern="[a-zA-Z,\s]+"
						       title="No symbols, numbers or special characters, except commas"
						       placeholder="Type None if no allergies, and separate by commas if multiple" >
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 col-form-label form-control-label">Email</label>
						<div class="col-lg-4">
							<input type="email"
							       class="form-control"
							       name="p_email"
							       value="<?php echo $p_record['p_email']; ?>"
							       placeholder="janedoe@email.com" >
						</div>
					<label class="col-lg-2 col-form-label form-control-label">Phone Number</label>
						<div class="col-lg-4">
							<input type="tel"
							       class="form-control"
							       name="p_phone"
							       value="<?php echo $p_record['phone']; ?>"
							       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
							       title="Phone number must match the following pattern: 000-000-0000"
							       placeholder="123-555-1234" >
						</div>
				</div>
				<p>
					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#insurance_collapse" aria-expanded="false" aria-controls="insurance_collapse" style="width: 100%">
						Insurance Information
					</button>
				</p>
				<div class="collapse" id="insurance_collapse">
					<div class="card card-body">
						<div class="form-group row">
							<label class="col-form-label form-control-label">Provider</label>
							<div class="col-lg-4">
								<input type="text"
								       class="form-control"
								       name="insurer"
								       value="<?php if($insurance['insurance_name'] != null) echo $insurance['insurance_name']; else echo 'N/A'; ?>"
								       pattern="[a-zA-Z\s]+"
								       title="No symbols, numbers or special characters, except hypens and spaces">
							</div>
							<label class="col-form-label">Policy Number</label>
							<div class="col-lg-3">
								<input type="text"
								       class="form-control"
								       name="policy_num"
								       value="<?php echo $insurance['policy_number']; ?>"
								       pattern="[a-zA-Z0-9-]+"
								       title="Only letters, numbers, and hyphens">
							</div>
							<label class="col-form-label">Deductible</label>
							<div class="col-lg-2">
								<input type="text"
								       class="form-control"
								       name="deductible"
								       value="<?php echo $insurance['deductible']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label">Policy Start Date</label>
							<div class="col-lg-3 form-group">
								<input type="date"
								       class="form-control"
								       name="policy_start"
								       value="<?php echo $insurance['start_date']; ?>">
							</div>
							<label class="col-form-label">Policy Expiration</label>
							<div class="col-lg-3 form-group">
								<input type="date"
								       class="form-control"
								       name="policy_end"
								       value="<?php echo $insurance['exp_date']; ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="form-row justify-content-center">
					<a href="view_patient.php?pid=<?php echo $patientID; ?>"><button type="button" class="btn btn-dark" style="font-size: 20px;">Back</button></a>
					<button type="submit" class="btn btn-success" name="updateButton" style="width: 150px; font-size: 20px; margin-left: 8px;">Update</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php include_once '../../footer.php'; ?>
