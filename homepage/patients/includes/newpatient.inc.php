<?php
    //Getting patient information from new patient form
    if(isset($_POST['p_first']))$p_first = strtoupper($mySQLI->escape_string($_POST['p_first']));
    if(isset($_POST['p_last']))$p_last = strtoupper($mySQLI->escape_string($_POST['p_last']));
    if(isset($_POST['p_dob']))$p_dob = strtoupper($mySQLI->escape_string($_POST['p_dob']));
    if(isset($_POST['p_sex']))$p_sex = strtoupper($mySQLI->escape_string($_POST['p_sex']));
    if(isset($_POST['p_addr']))$p_addr = strtoupper($mySQLI->escape_string($_POST['p_addr']));
    if(isset($_POST['p_city']))$p_city = strtoupper($mySQLI->escape_string($_POST['p_city']));
    if(isset($_POST['p_state']))$p_state = strtoupper($mySQLI->escape_string($_POST['p_state']));
    if(isset($_POST['p_zip']))$p_zip = $mySQLI->escape_string($_POST['p_zip']); else $p_zip = 'N/A';
    if(isset($_POST['p_allergies']))$p_allergies = strtoupper($mySQLI->escape_string($_POST['p_allergies']));
    if(isset($_POST['p_phone']))$p_phone = $mySQLI->escape_string($_POST['p_phone']); else $p_phone = 'N/A';
    if(isset($_POST['p_email']))$p_email = $mySQLI->escape_string($_POST['p_email']); else $p_email = 'N/A';

    //Generate unique patient id
    $p_id = rand(10000000, 99999999);
    //Assigning the patient their correct pharmacy ID
    $pharmID = $_SESSION['companyID'];

    //Adding insurance information if user enters it
    $provider = "N/A"; $policy_num = "N/A"; $deductible = "N/A";
    $start_date = "N/A"; $end_date = "N/A";
    if(isset($_POST['insurer']) || isset($_POST['policy_id']) || isset($_POST['deductible']) || isset($_POST['policy_start']) || isset($_POST['policy_end']))
    {
        $provider = strtoupper($mySQLI->escape_string($_POST['insurer']));
        $policy_num = $mySQLI->escape_string($_POST['policy_num']);
        $deductible = $mySQLI->escape_string($_POST['deductible']);
        $start_date = $mySQLI->escape_string($_POST['policy_start']);
        $end_date = $mySQLI->escape_string($_POST['policy_end']);

        $sql = "INSERT INTO insurance(insurance_name, policy_number, deductible, start_date, exp_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($mySQLI);
        if(mysqli_stmt_prepare($stmt, $sql))
        {
            mysqli_stmt_bind_param($stmt, 'sssss', $provider, $policy_num, $deductible, $start_date, $end_date);
            mysqli_stmt_execute($stmt);
        }
    }

    //Adding patient information
    $sql = "INSERT INTO patients(p_id, pharm_id, patient_first, patient_last, dob, sex, p_addr, p_city, p_state, p_zip, phone, 
                     p_email, allergies, insurance_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 'ssssssssssssss', $p_id, $pharmID, $p_first, $p_last, $p_dob, $p_sex, $p_addr,
            $p_city, $p_state, $p_zip, $p_phone, $p_email, $p_allergies, $policy_num);
        mysqli_stmt_execute($stmt);
    }

    header('location: new_patient.php?addsuccess');
    exit();
