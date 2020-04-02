<?php
    include('db_includes/database_info.inc.php');
    //Getting pharmacy information from registration form
    //Using escape_string to prevent SQL injection
    $user_first = $mysqli->escape_string($_POST['f_name']);
    $user_last = $mysqli->escape_string($_POST['l_name']);
    $user_addr = $mysqli->escape_string($_POST['addr']);
    $user_city = $mysqli->escape_string($_POST['city']);
    $user_state = $mysqli->escape_string($_POST['state']);
    $user_zip = $mysqli->escape_string($_POST['zipcode']);
    $user_phone = $mysqli->escape_string($_POST['phone']);
    $user_email = $mysqli->escape_string($_POST['email']);
    $user_type = $mysqli->escape_string($_POST['designation']);
    $user_license = $mysqli->escape_string($_POST['license']);

    $tempPass = 123456;

    //Hashing Password
    $pass = $mysqli->escape_string(password_hash($tempPass,PASSWORD_BCRYPT));

    //User Hash
    $userHash = $mysqli->escape_string(md5(rand(0,1000)));

    //Generate unique ID for the manager
    $user_id = substr(uniqid(rand()), 0, 6) + 27;

    //Assigning the pharmacy ID
    $pharmacyID = $_SESSION['companyID'];

    //Assigning first login value to true. System will check if this is true or false.
    //If true, user will be asked to change password when logging in for the first time
    $firstLogin = 1;

    //Inserting into the database
    $insertSQL = "INSERT INTO users(user_id, user_email, user_password, pharmacy_id, user_first, user_last, address, city, state, zipcode, license_num, hash, user_type, phone_number, active, first_login) 
                                values ('$user_id', '$user_email', '$pass', '$pharmacyID', '$user_first', '$user_last', '$user_addr', '$user_city', '$user_state', '$user_zip', '$user_license', '$userHash', '$user_type', '$user_phone', 1, '$firstLogin')";
    mysqli_query($mysqli, $insertSQL);

    header("location: ../homepage/new_employee.php?add=success");
    exit();
