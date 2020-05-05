<?php
    require_once 'mailer.inc.php';
    $link = HTTP;
    $user_id = $_SESSION['userID'];
    $pharm_id = $_SESSION['pharm_id'];
    $emp_email = $_SESSION['recepient'];
    $role = $_SESSION['role'];

    $mail->SetFrom('equinoxpharmacysystems@gmail.com', 'Equinox Systems');
    $mail->Subject = 'Equinox Account Credentials';
    if($role == "ADMIN")
    {
        $mail->Body =
            "
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" id=\"bodyTable\">
            <tr>
                <td align=\"center\" valign=\"top\">
                    <table border=\"0\" cellpadding=\"20\" cellspacing=\"0\" width=\"600\" id=\"emailContainer\">
                        <tr>
                            <td align=\"center\" valign=\"top\">
                                <h3 style=\"text-align: center; font-family: sans-serif; font-size: 30px;\">Equinox Pharmacy Systems</h3>
                                <hr>
                                <h4 style=\"text-align: center; font-family: sans-serif; font-size: 20px;\">Account Login Information</h4>
                                <p style=\"text-align: center; font-family: sans-serif; line-height: 1.6; font-size: 16px;\">
                                    Your account has been verified. Below are the login credentials for your account.
                                    You will need these to sign onto your account.
                                </p>
                                <p style=\"font-family: sans-serif; line-height: 1.6; font-size: 16px;\">
                                    <strong>USER ID:</strong> $user_id
                                    <br>
                                    <strong>COMPANY ID:</strong> $pharm_id
                                </p>
                                </p>
                                <p style=\"font-family: sans-serif; line-height: 1.6; font-size: 16px;\">
                                    Your company ID is tied to the pharmacy you have registered with. You may login to your Equinox account
                                    with the above USER ID and the password you set when you registered. Click the button below to go
                                    to the login page.
                                </p>
                                <br>
                                <button class=btn
                                        style=\"background-color: #47d147; padding: 5px 10px; font-size: 18px; outline: none; border-radius: 10px;\">
                                    <a href=\"$link/main/login.php\" style=\"text-decoration: none; color: white;\">LOGIN TO EQUINOX</a>
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
    }

    if($role == "USER")
    {
        $tempPass = $_SESSION['temp_pass'];
        unset($_SESSION['temp_pass']);
        $mail->Body =
            "
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" id=\"bodyTable\">
            <tr>
                <td align=\"center\" valign=\"top\">
                    <table border=\"0\" cellpadding=\"20\" cellspacing=\"0\" width=\"600\" id=\"emailContainer\">
                        <tr>
                            <td align=\"center\" valign=\"top\">
                                <h3 style=\"text-align: center; font-family: sans-serif; font-size: 30px;\">Equinox Pharmacy Systems</h3>
                                <hr>
                                <h4 style=\"text-align: center; font-family: sans-serif; font-size: 20px;\">Account Login Information</h4>
                                <p style=\"text-align: center; font-family: sans-serif; line-height: 1.6; font-size: 16px;\">
                                    Your account has been verified. Below are the login credentials for your account.
                                    You will need these to sign onto your account.
                                </p>
                                <p style=\"font-family: sans-serif; line-height: 1.6; font-size: 16px;\">
                                    <strong>USER ID:</strong> $user_id
                                    <br>
                                    <strong>COMPANY ID:</strong> $pharm_id
                                    <br>
                                    <strong>Temporary Password:</strong> $tempPass
                                </p>
                                </p>
                                <p style=\"font-family: sans-serif; line-height: 1.6; font-size: 16px;\">
                                    Your company ID is tied to the pharmacy you have registered with. You may login to your Equinox account
                                    with the above USER ID and temporary password. Once you sign in you may change the password from the
                                    user profile page. Click the button below to go to the login page.
                                </p>
                                <br>
                                <button class=btn
                                        style=\"background-color: #47d147; padding: 5px 10px; font-size: 18px; outline: none; border-radius: 10px;\">
                                    <a href=\"$link/main/login.php\" style=\"text-decoration: none; color: white;\">LOGIN TO EQUINOX</a>
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
    }
    $mail->AddAddress($emp_email);
    $mail->Send();
    unset($_SESSION['userID']);
    unset($_SESSION['pharm_id']);
    unset($_SESSION['recepient']);


