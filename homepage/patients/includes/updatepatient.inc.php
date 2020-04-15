<?php
    require_once 'database_info.inc.php';

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
    $p_phone2 = $mySQLI->escape_string($_POST['p_phone2']);
    $p_email = $mySQLI->escape_string($_POST['p_email']);
    $p_allergies = $mySQLI->escape_string($_POST['p_allergies']);

    //Patient insurance information
    $p_insurer = $mySQLI->escape_string($_POST['p_insurer']);
    $p_ins_id = $mySQLI->escape_string($_POST['p_ins_id']);

    //Patient Primary Care Physician information
    $pcp_name = $mySQLI->escape_string($_POST['pcp_name']);
    $pcp_addr = $mySQLI->escape_string($_POST['pcp_addr']);
    $pcp_phone = $mySQLI->escape_string($_POST['pcp_phone']);

    $updateSQL = "UPDATE patients SET p_first = '$p_first', p_last = '$p_last', p_dob = '$p_dob', p_sex = '$p_sex', 
                        p_addr = '$p_addr', p_city = '$p_city', p_state = '$p_state', p_zip = '$p_zip', p_phone = '$p_phone1', 
                        p_phone2 = '$p_phone2', p_email = '$p_email', allergies = '$p_allergies',  insurer = '$p_insurer', 
                        policy_num = '$p_ins_id', pcp_name = '$pcp_name', pcp_addr = '$pcp_addr', pcp_phone = '$pcp_phone' WHERE p_id = $pid";

    mysqli_query($mySQLI, $updateSQL) or die(mysqli_error($mySQLI));

    header('location: ../../homepage/patients/view_patient.php?pid='.$pid.'&update=success');
    exit();