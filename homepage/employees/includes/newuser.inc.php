<?php
    require_once '../../includes/mailer.inc.php';
    $link = HTTP.'main/verify.php?vkey=';

    //Getting pharmacy information from registration form
    //Using escape_string to prevent SQL injection
    if(isset($_POST['emp_first']))echo $emp_first = strtoupper($mySQLI->escape_string($_POST['emp_first']));
    if(isset($_POST['emp_last']))echo $emp_last = strtoupper($mySQLI->escape_string($_POST['emp_last']));
    if(isset($_POST['addr']))echo $emp_addr = strtoupper($mySQLI->escape_string($_POST['addr']));
    if(isset($_POST['city']))echo $emp_city = strtoupper($mySQLI->escape_string($_POST['city']));
    if(isset($_POST['state']))echo $emp_state = $mySQLI->escape_string($_POST['state']);
    if(isset($_POST['zip']))echo $emp_zip = $mySQLI->escape_string($_POST['zip']);
    if(isset($_POST['phone']))echo $emp_phone = $mySQLI->escape_string($_POST['phone']);
    if(isset($_POST['email']))echo $emp_email = $mySQLI->escape_string($_POST['email']);
    if(isset($_POST['emp_license']))echo $emp_license = $mySQLI->escape_string($_POST['emp_license']);
    if(isset($_POST['designation']))echo $role = strtoupper($mySQLI->escape_string($_POST['designation']));
    if(isset($_POST['emp_license']))echo $password = $mySQLI->escape_string($_POST['password']);
    $_SESSION['temp_pass'] = $password;
    $reg_date = date('Y-m-d');
    $is_verified = 0;

    //Backend validation checks
    //Check if license number is already in the system
    $sql = "SELECT * FROM employee WHERE emp_license = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $emp_license);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($result->num_rows > 0) {
            header("location: new_employee.php?error=license_exists");
            exit();
        }
    }

    //Check if email is already in the system
    $sql = "SELECT * FROM employee WHERE emp_email = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $emp_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($result->num_rows > 0) {
            header("location: registration.php?error=email_exists");
            exit();
        }
    }

    //Generate Salt
    $salt = uniqid(null, true);
    //Hashing Password
    $passHash = $mySQLI->escape_string(password_hash($password . $salt,PASSWORD_BCRYPT));
    //User unique hash
    $userHash = $mySQLI->escape_string(md5(rand(0,1000)));
    //Generate unique ID for the emp
    $emp_id = substr(uniqid(rand()), 0, 6) + 27;
    //Assigning the pharmacy ID
    $pharmacyID = $_SESSION['companyID'];

    //Add employee information to user table
    $sql = "INSERT INTO users(user_id, pharm_id, reg_date, salt, password, user_hash, is_verified, role, user_email) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sssssssss', $emp_id, $pharmacyID, $reg_date, $salt, $passHash,
            $userHash, $is_verified, $role, $emp_email);
        mysqli_stmt_execute($stmt);
    }

    //Add employee information to employee table
    $sql = "INSERT INTO employee (emp_id, emp_first, emp_last, emp_addr, emp_city, emp_state, emp_zip, emp_phone, emp_license, emp_email, pharm_id) 
                    VALUES(?, ?, ?, ?, ?, ?, ?, ? ,?, ? ,?)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sssssssssss',$emp_id, $emp_first, $emp_last, $emp_addr,
            $emp_city, $emp_state, $emp_zip, $emp_phone, $emp_license, $emp_email, $pharmacyID);
        mysqli_stmt_execute($stmt);
    }

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
                                <h4 style=\"text-align: center; font-family: sans-serif; font-size: 20px;\">
                                    Your Equinox account has been created!
                                </h4>
                                <p style=\"text-align: center; font-family: sans-serif; line-height: 1.6; font-size: 16px;\">
                                    Use the above account information to login to your Equinox account.
                                    You will have to verify your email before you can access your account. Please click the verify button below.
                                </p>
                                <p style=\"text-align: center; font-family: sans-serif;\">
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
    header('location: new_employee.php?employee_added');