<?php include_once '../../header.php'; ?>

<?php
	//Populating fields with patient information
	if(isset($_GET['pid'])) {
        require_once '../../includes/database_info.inc.php';
        $pid = $_GET['pid'];
        $patientSQL = "SELECT * FROM patients WHERE p_id = ?";
        $stmt = mysqli_stmt_init($mySQLI);
        if(!mysqli_stmt_prepare($stmt, $patientSQL)) {
			echo 'Error, SQL Failed';
        } else {
            mysqli_stmt_bind_param($stmt, 's', $pid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $record = mysqli_fetch_array($result);
        }

        //Check whether the user editing the patient has authorization
        //$pharmacyID = $_SESSION['companyID'];
        //if ($pharmacyID != $result['pharm_id']) {
          //  header('location: ../../401_unauthorized.php?confidential');
          //  exit();
      // } else {
            //Populate form fields with current patient information
            $p_first = $record['p_first'];
            $p_last = $record['p_last'];
            $p_dob = $record['p_dob'];
            $p_sex = $record['p_sex'];
            $p_addr = $record['p_addr'];
            $p_city = $record['p_city'];
            $p_state = $record['p_state'];
            $p_zip = $record['p_zip'];
            $p_phone1 = $record['p_phone1'];
            $p_phone2 = $record['p_phone2'];
            $p_email = $record['p_email'];
            $p_allergies = $record['allergies'];

            //Patient insurance information
            $p_insurer = $record['insurer'];
            $p_ins_id = $record['ins_id'];

            //Patient Primary Care Physician information
            $pcp_name = $record['pcp_name'];
            $pcp_addr = $record['pcp_addr'];
            $pcp_phone = $record['pcp_phone'];

            if (isset($_POST['save_edit'])) {
                require_once '../../includes/updatepatient.inc.php';
            }

      //  }
	}
?>

<link rel="stylesheet" href="../../stylesheets/crud_styles/patient_page_style.css">
<title>Update Patient</title>
<div class="container">
    <a href="patient_lookup.php"><button>Back</button></a>
    <h1>Update Patient</h1>
    <hr>
    <form action="" method="post">
        <h3>Patient Information</h3>
        <div class="row">
            <div class="form-group col-md-2">
                <label for="p_first">First Name</label>
                <input type="text" name="p_first" value="<?php echo $p_first ?>" required>
            </div>
            <div class="form-group col-md-2">
                <label for="p_last">Last Name</label>
                <input type="text" name="p_last" value="<?php echo $p_last ?>" required>
            </div>
            <div class="form-group col-md-2">
                <label for="p_dob">Date of Birth</label>
                <input type="date" name="p_dob" value="<?php echo $p_dob ?>" required>
            </div>
            <div class="form-group col-md-2">
                <label for="p_dob" required>Sex</label><br>
                <label class="radio-inline"><input type="radio" name="optradio" value="M" <?php if($p_sex == 'M'){echo 'checked';}?> >M</label>
                <label class="radio-inline"><input type="radio" name="optradio" value="F" <?php if($p_sex == 'F'){echo 'checked';}?> >F</label>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="p_addr">Patient Address</label>
                <input type="text" name="p_addr" size="40" value="<?php echo $p_addr ?>" required>
            </div>
            <div class="form-group col-md-2">
                <label for="p_city">City</label>
                <input type="text" name="p_city" value="<?php echo $p_city ?>" required>
            </div>
            <div class="form-group col-md-2">
                <label for="p_state">State</label>
	            <select id="inputState" class="form-control input-sm" name="p_state">
		            <option>State</option>
		            <option selected><?php echo $p_state?></option>
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
                <input type="text" name="p_zip" size="5" value="<?php echo $p_zip ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-1">
                <label for="p_allergies">Allergies</label>
                <input type="text" name="p_allergies" size="120" value="<?php echo $p_allergies ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-2">
                <label for="p_phone_1">Primary Phone</label>
                <input type="text" name="p_phone1" value="<?php echo $p_phone1 ?>" required>
            </div>
            <div class="form-group col-md-2">
                <label for="p_phone_2">Secondary Phone</label>
                <input type="text" name="p_phone2" value="<?php echo $p_phone2 ?>">
            </div>

            <div class="form-group col-md-1">
                <label for="p_email">Email</label>
                <input type="text" name="p_email" size="48" value="<?php echo $p_email ?>">
            </div>
        </div>
        <hr>
        <h3>Insurance Information</h3>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="p_insurer">Insurer</label>
                <input type="text" name="p_insurer" size="32" value="<?php echo $p_insurer ?>" required>
            </div>
            <div class="form-group col-md-2">
                <label for="p_ins_id">Insurance ID</label>
                <input type="text" name="p_ins_id" size="32" value="<?php echo $p_ins_id ?>" required>
            </div>
        </div>
        <hr>
        <h3>Primary Care Physician</h3>
        <div class="row">
            <div class="form-group col-md-2">
                <label for="pcp_name">PCP Name</label>
                <input type="text" name="pcp_name" size="25" value="<?php echo $pcp_name ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="pcp_addr">PCP Office Address</label>
                <input type="text" name="pcp_addr" size="55" value="<?php echo $pcp_addr ?>" required>
            </div>
            <div class="form-group col-md-2">
                <label for="pcp_phone">PCP Phone</label>
                <input type="text" name="pcp_phone" size="25" value="<?php echo $pcp_phone ?>" required>
            </div>
        </div>
        <button type="submit" name="save_edit">Save</button>
    </form>
</div>

<?php include_once '../../footer.php'; ?>