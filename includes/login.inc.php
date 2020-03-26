<?php
    include('dbinfo.inc.php');

    $company_id = $mysqli->escape_string($_POST['company_id']);
    $user_id = $mysqli->escape_string($_POST['user_id']);
    $password = $mysqli->escape_string($_POST['password']);

    //Find user in the users table
    $findUserID = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($mysqli, $findUserID);

    //If user ID exists
    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();
        $checkCompanyID = $user['pharmacy_id'];
        $userType = $user['user_type'];
        //Check if the company ID matches with the record
        if($company_id == $checkCompanyID)
        {
            //Check if password entered matches user's password in the database
            if(password_verify($password, $user['user_password']))
            {
                session_start();

                $_SESSION['employeeID'] = $user['user_id'];
                $_SESSION['companyID'] = $user['pharmacy_id'];
                $_SESSION['userType'] = $user['user_type'];
                $_SESSION['loggedIn'] = 'true';

                if($userType == 'Admin')
                {
                    header("location: homepage/main_page.php?login=success");
                    exit();
                }
                else if($userType == 'User')
                {
                    header("location: user_page.php?login=success");
                    exit();
                }
            }
            else
            {
                header("location: user_login.php?error=wrongpassword");
                exit();
            }
        }
        else
        {
            header("location: user_login.php?error=invalidcompany");
            exit();
        }
    }
    else
    {
        header("location: user_login.php?error=invaliduser");
        exit();
    }