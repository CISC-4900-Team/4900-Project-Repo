<?php include 'C:\Users\Home\Documents\PharmaSystem\includes\header.inc.php'; ?>
<link rel="stylesheet" href="../../stylesheets/crud_styles/patient_page_style.css">
<title>Update Patient</title>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db_includes/patientSchema.inc.php';

    $id = $_GET['pid'];
    $patientSQL = "SELECT * FROM patient_info WHERE pid = $id";
    $result = mysqli_query($pSQLI, $patientSQL);
    $record = mysqli_fetch_assoc($result);

    //Check whether the user editing the patient has authorization
    $pharmacyID = $_SESSION['companyID'];
    if($pharmacyID != $record['pharm_id'])
    {
        header('location: ../../401_unauthorized.php?confidential');
        exit();
    }
    else
    {
        echo 'editing patient: '.$id;
        //Populate form fields with current patient information
        $p_first = $record['p_first'];
        $p_last = $record['p_last'];
        $p_dob = $record['p_dob'];
        $p_sex = $record['p_sex'];
        $p_addr = $record['p_addr'];
        $p_city = $record['p_city'];
        $p_state = $record['p_state'];
        $p_zip = $record['p_zip'];
        $p_phone = $record['p_phone'];
        $p_allergies = $record['allergies'];

        //Patient insurance information
        $p_insurer = $record['insurer'];
        //$p_ins_id = $mysqli->escape_string($_POST['mgr_first']);

        //Patient Primary Care Physician information
        $pcp_name = $record['primary_physician'];
        $pcp_addr = $record['physician_addr'];
        $pcp_phone = $record['physician_phone'];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['save_edit']))
            {
                require '../../includes/crud_includes/updatepatient.inc.php';
            }
        }
    }
?>

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
                <input type="text" name="p_state" value="<?php echo $p_state ?>" required>
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
                <input type="text" name="p_phone_1" value="<?php echo $p_phone ?>" required>
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
                <input type="text" name="p_insurer" size="32" value="<?php echo $p_insurer ?>" required>
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
        <button name="save_edit">Save</button>
    </form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
