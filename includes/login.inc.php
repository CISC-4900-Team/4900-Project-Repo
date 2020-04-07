<?php
    require_once 'database_info.inc.php';

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
            header("location: login.php?error=invaliduser");
            exit();
        } else {
            //If user exists, fetch the row
            $user = $result->fetch_assoc();

            //Check if the company ID matches with the record
            if($user['pharm_id'] != $pharm_id)
            {
                header("location: login.php?error=invalidcompany");
                exit();

            } else {
                //Check if password entered matches user's password in the database
                if(password_verify($password, $user['u_pass'])) {
                    //Check if user account is verified
                    if(!$user['is_active']) {
                        header("location: login.php?error=unverified");
                        exit();
                    } else {
                        session_start();

                        $_SESSION['employeeID'] = $user['u_id'];
                        $_SESSION['companyID'] = $user['pharm_id'];
                        $_SESSION['userType'] = $user['u_type'];
                        $_SESSION['loggedIn'] = 'true';

                        //Getting employee information and setting session variables
                        $empID = $_SESSION['employeeID'];
                        echo $sql = "SELECT * FROM employees WHERE emp_id = $empID";
                        $result = mysqli_query($mySQLI, $sql);
                        $emp = mysqli_fetch_assoc($result);

                        echo $_SESSION['emp_first'] = $emp['emp_first'];
                        echo $_SESSION['emp_last'] = $emp['emp_last'];
                        echo $_SESSION['emp_phone1'] = $emp['emp_phone1'];
                        echo $_SESSION['emp_phone2'] = $emp['emp_phone2'];
                        echo $_SESSION['emp_email'] = $emp['emp_email'];

                        //Setting employee's last login
                        date_default_timezone_set('US/Eastern');
                        $timeStamp = date('m/d/Y h:i:s A', time());
                        $_SESSION['last_login'] = $timeStamp;
                        $sql = "UPDATE user_accounts SET last_login = '$timeStamp' WHERE u_id = $empID";
                        mysqli_query($mySQLI, $sql);
                        header("location: homepage/emp_page.php?login=success");
                        exit();
                    }
                } else {
                    header("location: login.php?error=wrongpassword");
                    exit();
                }
            }
        }
    }
