<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/patientSchema.inc.php';

    //Getting patient information from new patient form
    $p_first = $pSQLI->escape_string($_POST['p_first']);
    $p_last = $pSQLI->escape_string($_POST['p_last']);
    $p_dob = $pSQLI->escape_string($_POST['p_dob']);
    $p_sex = $pSQLI->escape_string($_POST['optradio']);
    $p_addr = $pSQLI->escape_string($_POST['p_addr']);
    $p_city = $pSQLI->escape_string($_POST['p_city']);
    $p_state = $pSQLI->escape_string($_POST['p_state']);
    $p_zip = $pSQLI->escape_string($_POST['p_zip']);
    $p_phone = $pSQLI->escape_string($_POST['p_phone_1']);
    $p_allergies = $pSQLI->escape_string($_POST['p_allergies']);

    //Patient insurance information
    $p_insurer = $pSQLI->escape_string($_POST['p_insurer']);
    //$p_ins_id = $mysqli->escape_string($_POST['mgr_first']);

    //Patient Primary Care Physician information
    $pcp_name = $pSQLI->escape_string($_POST['pcp_name']);
    $pcp_addr = $pSQLI->escape_string($_POST['pcp_addr']);
    $pcp_phone = $pSQLI->escape_string($_POST['pcp_phone']);

    //Generate unique patient id
    $pid = substr((uniqid(rand()) . 5), 3, 6);


    $addSQL = "INSERT INTO patient_info(pid, p_first, p_last, p_dob, p_sex, p_addr, p_city, p_state, p_zip, p_phone, allergies, insurer, primary_physician, physician_addr, physician_phone) 
    VALUES('$pid', '$p_first', '$p_last', '$p_dob', '$p_sex', '$p_addr', '$p_city', '$p_state', '$p_zip', '$p_phone', '$p_allergies', '$p_insurer', '$pcp_name', '$pcp_addr', '$pcp_phone')";
    mysqli_query($pSQLI, $addSQL);

    header('location: ../../homepage/crud/patient_lookup.php?patient_added');
    exit();