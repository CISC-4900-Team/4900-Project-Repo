<?php
    include $_SERVER["DOCUMENT_ROOT"].'/includes/database_info.inc.php';

    //Getting patient information from new patient form
    $p_first = $mySQLI->escape_string($_POST['p_first']);
    $p_last = $mySQLI->escape_string($_POST['p_last']);
    $p_dob = $mySQLI->escape_string($_POST['p_dob']);
    $p_sex = $mySQLI->escape_string($_POST['optradio']);
    $p_addr = $mySQLI->escape_string($_POST['p_addr']);
    $p_city = $mySQLI->escape_string($_POST['p_city']);
    $p_state = $mySQLI->escape_string($_POST['p_state']);
    $p_zip = $mySQLI->escape_string($_POST['p_zip']);
    $p_phone1 = $mySQLI->escape_string($_POST['p_phone1']);
    if(isset($_POST['p_phone2'])) {
        $p_phone2 = $mySQLI->escape_string($_POST['p_phone2']);
    } else {
        $p_phone2 = '0000000000';
    }
    if(isset($_POST['p_email'])) {
        $p_email = $mySQLI->escape_string($_POST['p_email']);
    } else {
        $p_email = 'none';
    }

    $p_allergies = $mySQLI->escape_string($_POST['p_allergies']);

    //Patient insurance information
    $p_insurer = $mySQLI->escape_string($_POST['p_insurer']);
    $p_ins_id = $mySQLI->escape_string($_POST['p_insurer']);

    //Patient Primary Care Physician information
    $pcp_name = $mySQLI->escape_string($_POST['pcp_name']);
    $pcp_addr = $mySQLI->escape_string($_POST['pcp_addr']);
    $pcp_phone = $mySQLI->escape_string($_POST['pcp_phone']);

    //Generate unique patient id
    $pid = substr((uniqid(rand()) . 5), 3, 6);

    //Assigning the patient their correct pharmacy ID
    $pharmID = $_SESSION['companyID'];

    $sql = "INSERT INTO patients(p_id, pharm_id, p_first, p_last, p_dob, p_sex, p_addr, p_city, p_state, p_zip, p_phone1, p_phone2, p_email, allergies, insurer, ins_id, pcp_name, pcp_addr, pcp_phone) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?)";

    $stmt = mysqli_stmt_init($mySQLI);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'SQL Statement Failed';
    } else {
        mysqli_stmt_bind_param($stmt, 'sssssssssssssssssss', $pid, $pharmID, $p_first, $p_last, $p_dob, $p_sex, $p_addr,
            $p_city, $p_state,  $p_zip, $p_phone1, $p_phone2, $p_email, $p_allergies, $p_insurer, $p_ins_id, $pcp_name, $pcp_addr, $pcp_phone);
        mysqli_stmt_execute($stmt);

        header('location: ../../homepage/patients/patient_lookup.php?patient_added');
        exit();
    }