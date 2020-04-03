<?php
    include $_SERVER["DOCUMENT_ROOT"].'/includes/database_info.inc.php';
    $htmlRoot = 'https://equinoxpharma.herokuapp.com';

    $pharm_id = $mySQLI->escape_string($_POST['pharm_id']);
    $emp_id = $mySQLI->escape_string($_POST['emp_id']);
    $password = $mySQLI->escape_string($_POST['password']);

    //Logic to check if user exists in the users table
    $sql = "SELECT * FROM user_accounts WHERE u_id = ?";

    $stmt = mysqli_stmt_init($mySQLI);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'SQL Statement Failed';
    } else {
        mysqli_stmt_bind_param($stmt, 's', $emp_id);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        //If user account doesn't exist
        if(!$result->num_rows > 0) {
            //header("location: user_login.php?error=invaliduser");
            header("location: $htmlRoot/user_login.php?error=invaliduser");
            exit();
        } else {
            //If user exists, fetch the row
            $user = $result->fetch_assoc();

            //Check if the company ID matches with the record
            if($user['pharm_id'] != $pharm_id)
            {
                //header("location: user_login.php?error=invalidcompany");
                header("location: $htmlRoot/user_login.php?error=invalidcompany");
                exit();

            } else {
                //Check if password entered matches user's password in the database
                if(password_verify($password, $user['u_pass'])) {
                    //Check if user account is verified
                    if(!$user['is_active']) {
                        //header("location: user_login.php?error=unverified");
                        header("location: $htmlRoot/user_login.php?error=unverified");
                        exit();
                    } else {
                        session_start();

                        $_SESSION['employeeID'] = $user['u_id'];
                        $_SESSION['companyID'] = $user['pharm_id'];
                        $_SESSION['userType'] = $user['u_type'];
                        $_SESSION['firstName'] = $user['u_id'];
                        $_SESSION['loggedIn'] = 'true';

                        //header("location: homepage/main_page.php?login=success");
                        header("location: $htmlRoot/homepage/main_page.php?login=success");
                        exit();
                    }
                } else {
                    //header("location: user_login.php?error=wrongpassword");
                    header("location: $htmlRoot/user_login.php?error=wrongpassword");
                    exit();
                }
            }
        }
    }
