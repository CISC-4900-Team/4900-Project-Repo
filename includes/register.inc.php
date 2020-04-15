<?php
    require_once 'database_info.inc.php';
    require_once 'mailer.inc.php';
    $link = HTTP.'verify.php?vkey=';

    //Getting pharmacy information from registration form
    //Using escape_string to prevent SQL injection
    $pharm_name = $mySQLI->escape_string($_POST['pharm_name']);
    $pharm_license = $mySQLI->escape_string($_POST['pharm_license']);
    $pharm_addr = $mySQLI->escape_string($_POST['pharm_addr']);
    $pharm_city = $mySQLI->escape_string($_POST['pharm_city']);
    $pharm_state = $mySQLI->escape_string($_POST['pharm_state']);
    $pharm_zip = $mySQLI->escape_string($_POST['pharm_zip']);
    $pharm_phone = $mySQLI->escape_string($_POST['pharm_phone']);
    $pharm_email = $mySQLI->escape_string($_POST['pharm_email']);

    //Getting manager information from registration form
    $emp_first = $mySQLI->escape_string($_POST['emp_first']);
    $emp_last = $mySQLI->escape_string($_POST['emp_last']);
    $emp_license = $mySQLI->escape_string($_POST['emp_license']);
    $emp_addr = $mySQLI->escape_string($_POST['emp_addr']);
    $emp_city = $mySQLI->escape_string($_POST['emp_city']);
    $emp_state = $mySQLI->escape_string($_POST['emp_state']);
    $emp_zip = $mySQLI->escape_string($_POST['emp_zip']);
    $emp_email = $mySQLI->escape_string($_POST['emp_email']);
    $emp_phone = $mySQLI->escape_string($_POST['emp_phone']);
    $emp_pass = $mySQLI->escape_string($_POST['emp_pwd']);
    $type = 'Admin';
    $firstLogin = 1;
    $isActive = 0;
    $last_login = '01/01/1970';

    //First run some validations to check if licenses or emails already exist in the system. Once all the validation
    //checks have passed, the pharmacy will be registered and the user admin account will be created

    //Check if pharmacy license already exists
    $sql = "SELECT * FROM pharmacies WHERE pharm_license = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 's', $pharm_license);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows > 0)
        {
            header("location: registration.php?error=pharm_license_exists");
            exit();
        }
    }

    //Check if pharmacy email address already exists
    $sql = "SELECT * FROM pharmacies WHERE pharm_email = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 's', $pharm_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows > 0) {
            header("location: registration.php?error=pharm_email_exists");
            exit();
        }
    }

    //Check if manager license number is already registered
    $sql = "SELECT * FROM employees WHERE emp_license = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 's', $emp_license);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result->num_rows > 0) {
            header("location: registration.php?error=manager_license_exists");
            exit();
        }
    }

    //Check if manager license number is already registered
    $sql = "SELECT * FROM employees WHERE emp_email = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 's', $emp_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result->num_rows > 0) {
            header("location: registration.php?error=manager_email_exists");
            exit();
        }
    }

    //If the code reaches this point, the above validations have passed; the pharmacy and user can be registered

    //Encrypting password
    $passHash = $mySQLI->escape_string(password_hash($emp_pass, PASSWORD_BCRYPT));

    //Generate unique user hash
    $hash = $mySQLI->escape_string(md5(rand(0,1000)));

    //Generating a pharmacy ID
    $pharm_id = substr((uniqid(rand()) . 5), 0, 6);

    //Generating a user ID
    $u_id = substr(uniqid(rand()), 0, 6);

    //Insert the form data into the relevant tables
    $sql = "INSERT INTO pharmacies (pharm_id, pharm_license, pharm_name, pharm_addr, pharm_city, pharm_state, pharm_zip, phone_number1, pharm_email) 
            values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 'sssssssss', $pharm_id, $pharm_license, $pharm_name, $pharm_addr, $pharm_city, $pharm_state, $pharm_zip, $pharm_phone, $pharm_email);
        mysqli_stmt_execute($stmt);
    } else {echo 'Error!'; }

    $sql = "INSERT INTO user_accounts (u_id, pharm_id, u_email, u_type, is_active, first_login, u_pass, u_hash, last_login) 
            values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 'sssssssss', $u_id, $pharm_id, $emp_email, $type, $isActive, $firstLogin, $passHash, $hash, $last_login);
        mysqli_stmt_execute($stmt);
    } else {echo 'Error!'; }

    $sql = "INSERT INTO employees (emp_id, pharm_id, emp_license, emp_first, emp_last, emp_addr, emp_city, emp_state, emp_zip, emp_phone1, emp_email) 
            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 'sssssssssss', $u_id, $pharm_id, $emp_license, $emp_first, $emp_last, $emp_addr, $emp_city, $emp_state, $emp_zip, $emp_phone, $emp_email);
        mysqli_stmt_execute($stmt);
    } else {echo 'Error!'; }

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
                            <p style=\"text-align: center; font-family: sans-serif;\">
                            </p>
                            <br>
                            <button class=btn
                                    style=\"background-color: #47d147; padding: 5px 10px; font-size: 18px; outline: none; border-radius: 10px;\">
                                <a href=$link$hash style=\"text-decoration: none; color: white;\">VERIFY EMAIL</a>
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
    header('location: registration_success.php');
    exit();








