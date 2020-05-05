<?php
    //Check if form is submitted before running script
    require_once 'mailer.inc.php';
    $link = HTTP . 'main/verify.php?vkey=';

    //Getting values from registration form and sanitize them with escape_string to prevent SQL injection
    if(isset($_POST['pharm_name'])) $pharm_name = strtoupper($mySQLI->escape_string($_POST['pharm_name']));
    if(isset($_POST['pharm_license'])) $pharm_license = $mySQLI->escape_string($_POST['pharm_license']);
    if(isset($_POST['pharm_addr'])) $pharm_addr = strtoupper($mySQLI->escape_string($_POST['pharm_addr']));
    if(isset($_POST['pharm_city'])) $pharm_city = strtoupper($mySQLI->escape_string($_POST['pharm_city']));
    if(isset($_POST['pharm_state'])) $pharm_state = strtoupper($mySQLI->escape_string($_POST['pharm_state']));
    if(isset($_POST['pharm_zip'])) $pharm_zip = $mySQLI->escape_string($_POST['pharm_zip']);
    if(isset($_POST['pharm_phone'])) $pharm_phone = $mySQLI->escape_string($_POST['pharm_phone']);
    if(isset($_POST['pharm_email'])) $pharm_email = $mySQLI->escape_string($_POST['pharm_email']);

    //Getting manager information from registration form
    if(isset($_POST['emp_first'])) $emp_first = strtoupper($mySQLI->escape_string($_POST['emp_first']));
    if(isset($_POST['emp_last'])) $emp_last = strtoupper($mySQLI->escape_string($_POST['emp_last']));
    if(isset($_POST['emp_license'])) $emp_license = $mySQLI->escape_string($_POST['emp_license']);
    if(isset($_POST['emp_addr'])) $emp_addr = strtoupper($mySQLI->escape_string($_POST['emp_addr']));
    if(isset($_POST['emp_city'])) $emp_city = strtoupper($mySQLI->escape_string($_POST['emp_city']));
    if(isset($_POST['emp_state'])) $emp_state = strtoupper($mySQLI->escape_string($_POST['emp_state']));
    if(isset($_POST['emp_zip'])) $emp_zip = $mySQLI->escape_string($_POST['emp_zip']);
    if(isset($_POST['emp_email'])) $emp_email = $mySQLI->escape_string($_POST['emp_email']);
    if(isset($_POST['emp_phone'])) $emp_phone = $mySQLI->escape_string($_POST['emp_phone']);
    if(isset($_POST['pharm_name'])) $emp_pass = $mySQLI->escape_string($_POST['emp_pwd']);
    $role = 'ADMIN';
    $is_verified = 0;
    $last_login = '01/01/1970';
    $reg_date = date('Y-m-d');
    $success = false;

    //First run some validations to check if licenses or emails already exist in the system. Once all the validation
    //checks have passed, the pharmacy will be registered and the user admin account will be created

    //Check if pharmacy email address already exists
    $sql = "SELECT * FROM pharmacies WHERE pharm_email = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $pharm_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($result->num_rows > 0) {
            header("location: registration.php?error=pharm_email_exists");
            exit();
        }
    }

    //Check if manager license number is already registered
    $sql = "SELECT * FROM employee WHERE emp_license = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $emp_license);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($result->num_rows > 0) {
            header("location: registration.php?error=manager_license_exists");
            exit();
        }
    }

    //Check if manager email is already registered
    $sql = "SELECT * FROM employee WHERE emp_email = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $emp_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($result->num_rows > 0) {
            header("location: registration.php?error=manager_email_exists");
            exit();
        }
    }

    //If the code reaches this point, the above validations have passed; the pharmacy and user can be registered

    //Generate random password salt. Password salts protect against rainbow table attacks
    $salt = uniqid(null, true);
    //Hashing password
    $passHash = $mySQLI->escape_string(password_hash($emp_pass . $salt, PASSWORD_BCRYPT));
    //Generate unique user hash
    $userHash = $mySQLI->escape_string(md5(rand(0, 1000)));
    //Generating a pharmacy ID
    $pharm_id = substr((uniqid(rand()) . 5), 0, 6);
    //Generating a user ID
    $u_id = substr(uniqid(rand()), 0, 6);

    //Insert the form data into the relevant tables
    $sql = "INSERT INTO pharmacies (pharm_id, pharm_name, pharm_addr, pharm_city, pharm_state, pharm_zip, pharm_phone, pharm_email) 
        values (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssssssss', $pharm_id, $pharm_name, $pharm_addr, $pharm_city, $pharm_state, $pharm_zip, $pharm_phone, $pharm_email);
        mysqli_stmt_execute($stmt);
        $success = true;
    } else {
        $success = false;
    }

    $sql = "INSERT INTO users (user_id, pharm_id, reg_date, salt, password, user_hash, is_verified, role, user_email) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sssssssss', $u_id, $pharm_id, $reg_date, $salt, $passHash, $userHash, $is_verified, $role, $emp_email);
        mysqli_stmt_execute($stmt);
        $success = true;
    } else {
        $success = false;
    }

    $sql = "INSERT INTO employee (emp_id, pharm_id, emp_license, emp_first, emp_last, emp_addr, emp_city, emp_state, emp_zip, emp_phone, emp_email) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sssssssssss', $u_id, $pharm_id, $emp_license, $emp_first, $emp_last, $emp_addr, $emp_city, $emp_state, $emp_zip, $emp_phone, $emp_email);
        mysqli_stmt_execute($stmt);
        $success = true;
    } else {
        $success = false;
    }

    if($success) {
        //Send verification email to user
        $mail->SetFrom('equinoxpharmacysystems@gmail.com', 'Equinox Systems');
        $mail->Subject = 'Equinox Account Verification';
        $mail->Body =
            "
            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" id=\"bodyTable\">
                <tr>
                    <td align=\"center\" valign=\"top\">
                        <table border=\"0\" cellpadding=\"20\" cellspacing=\"0\" width=\"600\" id=\"emailContainer\">
                            <tr>
                                <td align=\"center\" valign=\"top\">
                                    <h3 style=\"text-align: center; font-family: sans-serif; font-size: 30px;\">Equinox Pharmacy Systems</h3>
                                    <br>
                                    <hr>
                                    <br>
                                    <h4 style=\"text-align: center; font-family: sans-serif; font-size: 20px;\">Thank you for signing up with Equinox!</h4><br>
                                    <p style=\"text-align: center; font-family: sans-serif; line-height: 1.6; font-size: 16px;\">
                                        You will have to verify your email before accessing your account. Please click the verify button below.
                                        When your email has been verified a second email containing your login information will be sent to this email
                                    </p>
                                    <br>
                                    <button class=btn
                                            style=\"background-color: #47d147; padding: 5px 10px; font-size: 18px; outline: none; border-radius: 10px;\">
                                        <a href=$link$userHash style=\"text-decoration: none; color: white;\">VERIFY EMAIL</a>
                                    </button>
                                    <br>
                                    <hr>
                                    <p style=\"text-align: center; font-family: sans-serif; line-height: 1.5; font-size: 12px;\">
                                        This messages was sent from Equinox System Activation. If you believe this messages was sent in error, please contact
                                        the Equinox support team.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            ";
        $mail->AddAddress($emp_email);
        $mail->send();
        //Create a default schedule table for each pharmacy
        mysqli_query($mySQLI, "INSERT INTO emp_schedule (pharm_id, week_start) VALUES ('$pharm_id', '$reg_date')");
        header('location: ../messages/registration_success.php');
        exit();
    }







