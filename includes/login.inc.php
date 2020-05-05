<?php
    require_once 'database_info.inc.php';

    $emp_id = $mySQLI->escape_string($_POST['emp_id']);
    $password = $mySQLI->escape_string($_POST['password']);

    //Logic to check if user exists in the users table
    $sql = "SELECT * FROM users WHERE user_id = ?";

    $stmt = mysqli_stmt_init($mySQLI);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 's', $emp_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //If user account doesn't exist, return with error
        if(!$result->num_rows > 0) {
            header("location: login.php?error=not_found");
            exit();
        }

        $user = $result->fetch_assoc();
        //Check if password entered matches user's password in the database
        if(password_verify($password . $user['salt'], $user['password'])) {
            //Check if user account is verified
            if(!$user['is_verified']) {
                header("location: login.php?error=account_unverified");
                exit();
            } else {
                $_SESSION['employeeID'] = $user['user_id'];
                $_SESSION['companyID'] = $user['pharm_id'];
                $_SESSION['userType'] = $user['role'];
                $_SESSION['loggedIn'] = 'true';

                //Getting employee information and setting session variables
                $empID = $_SESSION['employeeID'];
                $sql = "SELECT * FROM employee WHERE emp_id = $empID";
                $result = mysqli_query($mySQLI, $sql);
                $emp = mysqli_fetch_assoc($result);

                $_SESSION['emp_first'] = $emp['emp_first'];
                $_SESSION['emp_last'] = $emp['emp_last'];
                $_SESSION['emp_phone'] = $emp['emp_phone'];
                $_SESSION['emp_email'] = $emp['emp_email'];

                //Setting employee's last login
                date_default_timezone_set('US/Eastern');
                $timeStamp = date('Y-m-d h:i:s', time());
                $userID = $user['user_id'];

                //Set last login timestamp
                mysqli_query($mySQLI, "INSERT INTO login_records(user_id, last_login) VALUES('$userID', '$timeStamp')");

                //Get last login ID so it can be updated when user logs out
                $result = mysqli_query($mySQLI, "SELECT id FROM login_records WHERE user_id = '$userID' ORDER BY id DESC LIMIT 1;");
                $loginRecord = mysqli_fetch_assoc($result);
                echo $_SESSION['last_login_id'] = $loginRecord['id'];
                header("location: ../homepage/emp_page.php?login=success");
                exit();
            }
        }
        else
        {
            header("location: login.php?error=wrongpassword");
            exit();
        }
    }
