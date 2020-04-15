<?php
    require_once(ROOT.'includes/database_info.inc.php');

    //Getting patient information from new patient form
    $p_first = $mySQLI->escape_string($_POST['p_first']);
    $p_last = $mySQLI->escape_string($_POST['p_last']);
    $p_dob = $mySQLI->escape_string($_POST['p_dob']);
    $p_sex = $mySQLI->escape_string($_POST['p_sex']);
    $p_addr = $mySQLI->escape_string($_POST['p_addr']);
    $p_city = $mySQLI->escape_string($_POST['p_city']);
    $p_state = $mySQLI->escape_string($_POST['p_state']);
    $p_zip = $mySQLI->escape_string($_POST['p_zip']);
    $p_allergies = $mySQLI->escape_string($_POST['p_allergies']);

    $p_phone = "not set"; $p_email = "not set";
    if(isset($_POST['p_phone'])){$p_phone = $mySQLI->escape_string($_POST['p_phone']);}
    if(isset($_POST['p_email'])){$p_email = $mySQLI->escape_string($_POST['p_email']);}

    $p_insurer = "not set"; $policy_num = "not set"; $ins_deductible = "not set";

    if(isset($_POST['p_insurer'])){$p_insurer = $mySQLI->escape_string($_POST['p_insurer']);}
    if(isset($_POST['policy_id'])){$policy_num = $mySQLI->escape_string($_POST['policy_id']);}
    if(isset($_POST['deductible'])){$ins_deductible = $mySQLI->escape_string($_POST['deductible']);}

    $pcp_name = 'Not Set'; $pcp_addr = 'Not Set'; $pcp_phone = 'Not Set';
    if(isset($_POST['pcp_name'])){$pcp_name = $mySQLI->escape_string($_POST['pcp_name']);}
    if(isset($_POST['pcp_addr'])){$pcp_addr = $mySQLI->escape_string($_POST['pcp_addr']);}
    if(isset($_POST['pcp_phone'])){$pcp_phone = $mySQLI->escape_string($_POST['pcp_phone']);}

    //Generate unique patient id
    $pid = substr((uniqid(rand()) . 5), 3, 6);

    //Assigning the patient their correct pharmacy ID
    $pharmID = $_SESSION['companyID'];

    $sql = "INSERT INTO patients(p_id, pharm_id, p_first, p_last, p_dob, p_sex, p_addr, p_city, p_state, p_zip, p_phone, p_email, allergies, insurer, policy_num) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    echo $p_first.' '.$p_last.' '.$p_dob.' '.$p_sex.' '.$p_addr.' '.$p_city.' '.$p_state.' '.$p_zip.' '.$p_allergies.' '.$p_phone.' '.$p_email.' '
        .$p_insurer.' '.$policy_num.' '.$ins_deductible.' '.$pcp_name.' '.$pcp_addr.' '.$pcp_phone;
    /*
    $stmt = mysqli_stmt_init($mySQLI);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 'sssssssssssssss', $pid, $pharmID, $p_first, $p_last, $p_dob, $p_sex, $p_addr,
            $p_city, $p_state, $p_zip, $p_phone, $p_email, $p_allergies, $p_insurer, $policy_num);
        mysqli_stmt_execute($stmt);
    } else {
        echo 'Error!';
    }
    */