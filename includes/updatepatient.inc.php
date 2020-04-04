<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/database_info.inc.php';

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

    $updateSQL = "UPDATE patient_info SET p_first = '$p_first', p_last = '$p_last', p_dob = '$p_dob', p_sex = '$p_sex', 
                        p_addr = '$p_addr', p_city = '$p_city', p_state = '$p_state', p_zip = '$p_zip', p_phone = '$p_phone', 
                        allergies = '$p_allergies',  insurer = '$p_insurer', primary_physician = '$pcp_name', 
                        physician_addr = '$pcp_addr', physician_phone = '$pcp_phone' WHERE pid = $id";

    mysqli_query($pSQLI, $updateSQL) or die(mysqli_error($pSQLI));

    header('location: ../../homepage/patients/view_patient.php?pid='.$id.'&update=success');
    exit();