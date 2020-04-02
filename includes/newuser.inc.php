<?php
    include('db_includes/database_info.inc.php');
    //Getting pharmacy information from registration form
    //Using escape_string to prevent SQL injection
    $user_first = $mySQLI->escape_string($_POST['f_name']);
    $user_last = $mySQLI->escape_string($_POST['l_name']);
    $user_addr = $mySQLI->escape_string($_POST['addr']);
    $user_city = $mySQLI->escape_string($_POST['city']);
    $user_state = $mySQLI->escape_string($_POST['state']);
    $user_zip = $mySQLI->escape_string($_POST['zipcode']);
    $user_phone = $mySQLI->escape_string($_POST['phone']);
    if(isset($_POST['phone2'])) {
        $user_phone2 = $mySQLI->escape_string($_POST['phone2']);
    }
    $user_email = $mySQLI->escape_string($_POST['email']);
    $user_type = $mySQLI->escape_string($_POST['designation']);
    $user_license = $mySQLI->escape_string($_POST['license']);

    $tempPass = 123456;

    //Hashing Password
    $pass = $mySQLI->escape_string(password_hash($tempPass,PASSWORD_BCRYPT));

    //User Hash
    $userHash = $mySQLI->escape_string(md5(rand(0,1000)));

    //Generate unique ID for the user
    $user_id = substr(uniqid(rand()), 0, 6) + 27;

    //Assigning the pharmacy ID
    $pharmacyID = $_SESSION['companyID'];

    //Assigning first login value to true. System will check if this is true or false.
    //If true, user will be asked to change password when logging in for the first time
    $first_login = 1;
    $is_active = 0;

    //Inserting into the database

    header("location: ../homepage/new_employee.php?add=success");
    exit();
