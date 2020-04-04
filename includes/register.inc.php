<?php
    require_once 'database_info.inc.php';
    require_once 'mailer.inc.php';

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

    //Encrypting password
    $passHash = $mySQLI->escape_string(password_hash($emp_pass, PASSWORD_BCRYPT));

    //User hash code
    $hash = $mySQLI->escape_string(md5(rand(0,1000)));

    //1. Create SQL statement
    $sql = "SELECT * FROM pharmacies WHERE pharm_license = ?";

    //2. Create prepared statement
    $stmt = mysqli_stmt_init($mySQLI);

    //3. Prepare the prepared statement and check if it will run
    //In PHP check for failure before checking for success
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'SQL Statement Failed';
    } else {
        //4. Bind parameters to placeholder(s)
        mysqli_stmt_bind_param($stmt, 's', $pharm_license);

        //5. Run parameters inside database
        mysqli_stmt_execute($stmt);

        //6. Get result(s) from executed statement
        $result = mysqli_stmt_get_result($stmt);

        //7. Parse result(s)
        if($result->num_rows > 0) {
            header("location: registration.php?error=license_exists");
            exit();
        } else {
            //Check users table to see if manager email already exists in the system
            $sql = "SELECT * FROM user_accounts WHERE u_email = ?";

            $stmt = mysqli_stmt_init($mySQLI);

            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo 'SQL Statement Failed';
            } else {
                mysqli_stmt_bind_param($stmt, 's', $emp_email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($result->num_rows > 0) {
                    header("location: registration.php?error=email_exists");
                    exit();
                } else {

                    //Generate unique ID for the pharmacy
                    $pharm_id = substr((uniqid(rand()) . 5), 0, 6);

                    //Generate unique ID for the manager
                    $u_id = substr(uniqid(rand()), 0, 6);

                    //Insert pharmacy information
                    $sql = "INSERT INTO pharmacies (pharm_id, pharm_license, pharm_name, pharm_addr, pharm_city, pharm_state, pharm_zip, phone_number1, pharm_email) 
                            values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($mySQLI);
                    if(mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'sssssssss', $pharm_id, $pharm_license, $pharm_name, $pharm_addr, $pharm_city, $pharm_state, $pharm_zip, $pharm_phone, $pharm_email);
                        mysqli_stmt_execute($stmt);
                    }

                    //Insert manager account information
                    $sql = "INSERT INTO user_accounts (u_id, pharm_id, u_email, u_type, is_active, first_login, u_pass, u_hash) 
                            values (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($mySQLI);
                    if(mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'ssssssss', $u_id, $pharm_id, $emp_email, $type, $isActive, $firstLogin, $passHash, $hash);
                        mysqli_stmt_execute($stmt);
                    }

                    //Insert manager employee information
                    $sql = "INSERT INTO employees (emp_id, pharm_id, emp_license, emp_first, emp_last, emp_addr, emp_city, emp_state, emp_zip, emp_phone1, emp_email) 
                            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($mySQLI);
                    if(mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'sssssssssss', $u_id, $pharm_id, $emp_license, $emp_first, $emp_last, $emp_addr, $emp_city, $emp_state, $emp_zip, $emp_phone, $emp_email);
                        mysqli_stmt_execute($stmt);
                    }

                    $mail->SetFrom('equinoxpharmacysystems@gmail.com', 'Equinox Systems');
                    $mail->Subject = 'Equinox Account Verification';
                    $mail->Body = "
                    <h3>Thank You for Registering</h3><br>
                    <p>Please click this <a href='#'>verification</a> link to verify your email</p><br>
                    <p>Once the email has been verified, an email with your login credentials will be sent. </p>        
                    ";
                    $mail->AddAddress($emp_email);
                    if(!$mail->Send()) {
                        $error = 'Mail error: '.$mail->ErrorInfo;
                        return false;
                    } else {
                        $error = 'Message sent!';
                        return true;
                    }
                }
            }
        }
    }


