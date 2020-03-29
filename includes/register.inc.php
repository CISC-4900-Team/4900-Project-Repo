<?php
    include('registrarSchema.inc.php');
    //Getting pharmacy information from registration form
    //Using escape_string to prevent SQL injection
    $pharm_license = $mysqli->escape_string($_POST['pharm_license']);
    $pharm_name = $mysqli->escape_string($_POST['pharm_name']);
    $pharm_addr = $mysqli->escape_string($_POST['pharm_addr']);
    $pharm_city = $mysqli->escape_string($_POST['pharm_city']);
    $pharm_state = $mysqli->escape_string($_POST['pharm_state']);
    $pharm_zip = $mysqli->escape_string($_POST['pharm_zip']);
    $pharm_phone = $mysqli->escape_string($_POST['pharm_phone']);
    $pharm_email = $mysqli->escape_string($_POST['pharm_email']);

    //Getting manager information from registration form
    $mgr_license = $mysqli->escape_string($_POST['pharm_license']);
    $mgr_first = $mysqli->escape_string($_POST['mgr_first']);
    $mgr_last = $mysqli->escape_string($_POST['mgr_last']);
    $mgr_addr = $mysqli->escape_string($_POST['mgr_address']);
    $mgr_city = $mysqli->escape_string($_POST['mgr_city']);
    $mgr_state = $mysqli->escape_string($_POST['mgr_state']);
    $mgr_zip = $mysqli->escape_string($_POST['mgr_zip']);
    $mgr_email = $mysqli->escape_string($_POST['mgr_email']);

    //Hashing Password
    $mgr_pass = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    //User Hash
    $hash = $mysqli->escape_string(md5(rand(0,1000)));

    //Check pharmacies table to see if pharmacy license already exists
    $sql = "SELECT * FROM pharmacies WHERE pharmacy_license = '$pharm_license'";
    $checkPharmacyLicense  = mysqli_query($mysqli, $sql);

    if($checkPharmacyLicense->num_rows > 0)
    {
        echo 'license error';
    }
    else //Check users table to see if manager email already exists in the system
    {
        $checkUserEmail = $mysqli->query("SELECT * FROM users WHERE user_email = '$mgr_email'");
        if($checkUserEmail->num_rows > 0)
        {
            echo 'manager email error';
        }
        else //If pharmacy doesnt exist in the system AND manager does not exist in the system
        {
            //Generate unique ID for the pharmacy
            $pharmacy_id = substr((uniqid(rand()) . 5), 0, 6);

            //Generate unique ID for the manager
            $user_id = substr(uniqid(rand()), 0, 6);

            $sql = "INSERT INTO pharmacies (pharmacy_id, pharmacy_name, pharmacy_addr, city, state, zip, phone_number, pharmacy_email, pharmacy_license) 
                                values ('$pharmacy_id', '$pharm_name', '$pharm_addr', '$pharm_city', '$pharm_state', '$pharm_zip', '$pharm_phone', '$pharm_email', '$pharm_license')";
            mysqli_query($mysqli, $sql) or die('error');

            $sql = "INSERT INTO users (user_id, user_email, user_password, pharmacy_id, user_first, user_last, address, city, state, zipcode, license_num, hash, user_type, phone_number, active) 
                                values ('$user_id', '$mgr_email', '$mgr_pass', '$pharmacy_id', '$mgr_first', '$mgr_last', '$mgr_addr', '$mgr_city', '$mgr_state', '$mgr_zip', '$mgr_license', '$hash', 'Admin', '0000000000', 1)";
            mysqli_query($mysqli, $sql);

            echo 'Added pharmacy and manager successfully';
            header("location: register_success.php");
            exit();
        }
    }