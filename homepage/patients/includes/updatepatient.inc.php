<?php
    $patientID = $_GET['pid'];
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

    $sql = "UPDATE patients SET patient_first = ?, patient_last = ?, dob = ?, sex = ?, allergies = ?, p_addr = ?, 
                    p_city = ?, p_state = ?, p_zip = ?, p_email = ?, phone = ? WHERE p_id = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 'ssssssssssss', $p_first, $p_last, $p_dob, $p_sex, $p_allergies,
            $p_addr, $p_city, $p_state, $p_zip, $p_email, $p_phone, $patientID);
        mysqli_stmt_execute($stmt);
    }

    $provider = "N/A"; $policy_num = 00000000; $deductible = 0;
    $start_date = "1970-01-01"; $end_date = "1970-01-01";
    if(isset($_POST['policy_num']))
    {
        $provider = strtoupper($mySQLI->escape_string($_POST['insurer']));
        $policy_num = $mySQLI->escape_string($_POST['policy_num']);
        $deductible = $mySQLI->escape_string($_POST['deductible']);
        $start_date = $mySQLI->escape_string($_POST['policy_start']);
        $end_date = $mySQLI->escape_string($_POST['policy_end']);

        $sql = "SELECT * FROM insurance WHERE policy_number = '$policy_num'";
        $result = mysqli_query($mySQLI, $sql);
        if($result->num_rows > 0)
        {
            $sql = "UPDATE insurance SET insurance_name = ?, policy_number = ?, deductible = ?, start_date = ?, exp_date = ? WHERE policy_number = ?";
            $stmt = mysqli_stmt_init($mySQLI);
            if(mysqli_stmt_prepare($stmt, $sql))
            {
                mysqli_stmt_bind_param($stmt, 'ssssss', $provider, $policy_num, $deductible, $start_date, $end_date, $policy_num);
                mysqli_stmt_execute($stmt);
            }
            else echo mysqli_error($mySQLI);
            mysqli_query($mySQLI, "UPDATE patients SET insurance_id = '$policy_num' WHERE p_id = '$patientID'");
        }
        else
        {
            $sql = "INSERT INTO insurance(insurance_name, policy_number, deductible, start_date, exp_date) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($mySQLI);
            if(mysqli_stmt_prepare($stmt, $sql))
            {
                mysqli_stmt_bind_param($stmt, 'sssss', $provider, $policy_num, $deductible, $start_date, $end_date);
                mysqli_stmt_execute($stmt);
            } else echo mysqli_error($mySQLI);
            mysqli_query($mySQLI, "UPDATE patients SET insurance_id = '$policy_num' WHERE p_id = '$patientID'");
        }
    }else echo mysqli_error($mySQLI);
    header('location: view_patient?pid='.$patientID);
    exit();

