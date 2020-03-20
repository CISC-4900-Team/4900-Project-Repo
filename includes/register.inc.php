<?php
    include('dbinfo.inc.php');
    //Pharmacy Information
    $pharm_license = $mysqli->escape_string($_POST['pharm_license']);
    $pharm_name = $mysqli->escape_string($_POST['pharm_name']);
    $pharm_addr = $mysqli->escape_string($_POST['pharm_addr']);
    $pharm_city = $mysqli->escape_string($_POST['pharm_city']);
    $pharm_state = $mysqli->escape_string($_POST['pharm_state']);
    $pharm_zip = $mysqli->escape_string($_POST['pharm_zip']);
    $pharm_phone = $mysqli->escape_string($_POST['pharm_phone']);
    $pharm_email = $mysqli->escape_string($_POST['pharm_email']);

    //Manager Information
    $mgr_license = $mysqli->escape_string($_POST['pharm_license']);
    $mgr_first = $mysqli->escape_string($_POST['mgr_first']);
    $mgr_last = $mysqli->escape_string($_POST['mgr_last']);
    $mgr_addr = $mysqli->escape_string($_POST['mgr_address']);
    $mgr_city = $mysqli->escape_string($_POST['mgr_city']);
    $mgr_state = $mysqli->escape_string($_POST['mgr_state']);
    $mgr_zip = $mysqli->escape_string($_POST['mgr_zip']);
    $mgr_email = $mysqli->escape_string($_POST['mgr_email']);

    //Hashing Password
    $mgr_pass = $mysqli->escape_string(password_hash($_POST['mgr_pass'], PASSWORD_BCRYPT));
    //User Hash
    $hash = $mysqli->escape_string(md5(rand(0,1000)));

    //Check pharmacies table to see if pharmacy license already exists
    $sql = "SELECT * FROM users WHERE user_email = '$mgr_email'";
    $checkPharmacyLicense  = mysqli_query($mysqli, $sql);

    if($checkPharmacyLicense->num_rows > 0)
    {
        $_SESSION['message'] = 'This pharmacy already exists in the system. Consult with your pharmacy manager or contact support';
        header("location: #");
    }
    else //Check users table to see if manager email already exists in the system
    {
        $checkUserEmail = $mysqli->query("SLECT * FROM users WHERE user_email = '$mgr_email'");
        if($checkUserEmail->num_rows > 0)
        {
            $_SESSION['message'] = 'This user already exists in the system. Consult with your pharmacy manager or contact support';
            header("location: #");
        }
        else //If pharmacy doesnt exist in the system AND manager does not exist in the system
        {
            //Generate unique ID for the pharmacy
            $pharmacy_id = substr(uniqid(rand()), 0, 6);
            //Generate unique ID for the manager
            $user_id = substr(uniqid(rand()), 0, 6);

            $mysqli->query('INSERT INTO users (user_id, user_email, user_password, pharmacy_id, user_first, user_last, address, city, state, zipcode, license_num, active, hash) values ()');
        }
    }
?>