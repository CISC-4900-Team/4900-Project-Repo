<?php include_once '../../header.php'; ?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	    if(isset($_POST['add']))
	        require 'includes/newpatient.inc.php';
?>

<link rel="stylesheet" href="css/new_patient.css">
<title>New Patient</title>
<div class="container">
    <form class="card card-outline-secondary">
        <div class="card-header">
            <h3 class="mb-0">New Patient</h3>
	        <p>* = Required</p>
        </div>
	    <form autocomplete="off" name="new_patient" action="" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label form-control-label">First Name *</label>
                    <div class="col-lg-4">
                        <input class="form-control" type="text" placeholder="Jane" name="p_first" pattern="[a-zA-Z-]+"
                               title="No symbols, numbers or special characters, except hypens" >
                    </div>
	                <label class="col-lg-2 col-form-label form-control-label">Last Name *</label>
	                <div class="col-lg-4">
		                <input class="form-control" type="text" placeholder="Doe" name="p_last" pattern="[a-zA-Z-]+"
		                       title="No symbols, numbers or special characters, except hypens" >
	                </div>
                </div>
	            <div class="form-group row">
		            <label class="col-lg-2 col-form-label form-control-label">Date of Birth*</label>
		            <div class="col-lg-4">
			            <input class="form-control" type="date" id="birthday" name="p_dob" >
		            </div>
		            <label class="col-lg-3 col-form-label form-control-label">Sex *</label>
		            <div class="form-check-inline col-lg-1">
			            <label class="form-check-label">
				            <input type="radio" class="form-check-input" name="p_sex" value="M" checked>Male
			            </label>
		            </div>
		            <div class="form-check-inline col-lg-1">
			            <label class="form-check-label">
				            <input type="radio" class="form-check-input" name="p_sex" value="F">Female
			            </label>
		            </div>
	            </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label form-control-label">Address *</label>
                    <div class="col-lg-4">
                        <input class="form-control" type="text" name="p_addr" pattern="[a-zA-Z0-9-\s.]+"
                               title="Only letters, numbers, and hyphens" >
                    </div>
	                <label class="col-lg-2 col-form-label form-control-label">City *</label>
	                <div class="col-lg-4">
		                <input class="form-control" type="text" name="p_city" pattern="[a-zA-Z\s]+"
		                       title="No symbols, numbers or special characters" >
	                </div>
                </div>
	            <div class="form-group row">
		            <label class="col-lg-2 col-form-label form-control-label">State *</label>
		            <div class="col-lg-4">
			            <select id="inputState" class="form-control" name="p_state" >
	                        <?php
		                        $states = array("AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC", "DE", "FL", "GA", "HI", "IA",
		                            "ID", "IL", "IN", "KS", "KY", "LA", "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC",
		                            "ND", "NE", "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN",
		                            "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY");
		                        for($i=0;$i<50;$i++):?>
						            <option value="<?php echo "$states[$i]"?>"><?php echo "$states[$i]"?></option>
	                        <?php endfor; ?>
			            </select>
		            </div>
		            <label class="col-lg-2 col-form-label form-control-label">Zip *</label>
		            <div class="col-lg-4">
			            <input class="form-control" type="text" name="p_zip" placeholder="12345" pattern="[0-9]{5}"
			                   title="5 Digit Zipcode" >
		            </div>
	            </div>
	            <div class="form-group row">
		            <label class="col-lg-2 col-form-label form-control-label">Allergies *</label>
		            <div class="col-lg-10">
			            <input class="form-control" type="text" name="p_allergies" pattern="[a-zA-Z,\s]+"
			                   title="No symbols, numbers or special characters, except commas" placeholder="Type None if no allergies, and separate by commas if multiple" >
		            </div>
	            </div>
	            <div class="form-group row">
		            <label class="col-lg-2 col-form-label form-control-label">Email</label>
		            <div class="col-lg-4">
			            <input class="form-control" type="email" placeholder="janedoe@email.com" name="p_email">
		            </div>
		            <label class="col-lg-2 col-form-label form-control-label">Phone Number</label>
		            <div class="col-lg-4">
			            <input type="tel" class="form-control" name="p_phone" placeholder="123-555-1234" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Phone number must match the following pattern: 000-000-0000">
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
					            <input class="form-control" type="text" name="insurer" pattern="[a-zA-Z\s]+"
					                   title="No symbols, numbers or special characters, except hypens and spaces">
				            </div>
				            <label class="col-form-label">Policy Number</label>
				            <div class="col-lg-3">
					            <input class="form-control" type="text" name="policy_num" pattern="[a-zA-Z0-9-]+"
					                   title="Only letters, numbers, and hyphens">
				            </div>
				            <label class="col-form-label">Deductible</label>
				            <div class="col-lg-2">
					            <input class="form-control" type="text" name="deductible">
				            </div>
			            </div>
			            <div class="form-group row">
				            <label class="col-form-label">Policy Start Date</label>
				            <div class="col-lg-3 form-group">
					            <input class="form-control" type="date" name="policy_start">
				            </div>
				            <label class="col-form-label">Policy Expiration</label>
				            <div class="col-lg-3 form-group">
					            <input class="form-control" type="date" name="policy_end">
				            </div>
			            </div>
		            </div>
	            </div>
                <div class="form-row justify-content-center">
                    <div class="col-lg-2">
	                    <button type="submit" class="btn btn-primary add-btn" name="add" formmethod="post">Add Patient</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../footer.php'; ?>
