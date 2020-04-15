<?php
    require_once 'database_info.inc.php';

    if(isset($_POST['request_reset_btn'])) {
        require_once 'mailer.inc.php';
        $link = HTTP.'reset_form.php?vkey=';

        $emp_id = $mySQLI->escape_string($_POST['emp_id']);
        $emp_email = $mySQLI->escape_string($_POST['emp_email']);

        $sql = "SELECT * FROM user_accounts WHERE u_id = ? AND u_email = ?";
        $stmt = mysqli_stmt_init($mySQLI);
        if(mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ss', $emp_id, $emp_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($result->num_rows > 0) {
                $user = mysqli_fetch_assoc($result);
                $hash = $user['u_hash'];
                try {
                    $mail->SetFrom('equinoxpharmacysystems@gmail.com', 'Equinox Systems');
                } catch (phpmailerException $e) {
                }
                $mail->Subject = 'Equinox Account Password Reset';
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
                                        <h4 style=\"text-align: center; font-family: sans-serif; font-size: 20px;\">Password Reset</h4><br>
                                        <p style=\"text-align: center; font-family: sans-serif; line-height: 1.6; font-size: 16px;\">
                                            Please click the button below to reset your account password. If you did not request a password
                                            reset please change your password or contact Equinox customer support.
                                        </p>
                                        <p style=\"text-align: center; font-family: sans-serif;\">
                                        </p>
                                        <br>
                                        <button class=btn
                                                style=\"background-color: #47d147; padding: 5px 10px; font-size: 18px; outline: none; border-radius: 10px;\">
                                            <a href=$link$hash\" style=\"text-decoration: none; color: white;\">RESET PASSWORD</a>
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
                try {
                    if (!$mail->Send()) {
                        $error = 'Mail error: ' . $mail->ErrorInfo;
                    } else {
                        $error = 'Message sent!';
                    }
                } catch (phpmailerException $e) {
                }
                header('location: reset_password.php?success');
                exit();
            } else {
                header('location: reset_password.php?failure');
                exit();
            }
        }
    }

    if(isset($_POST['reset_pass_btn'])) {
        $hash = $_GET['vkey'];
        $newPass = $mySQLI->escape_string($_POST['emp_pass']);
        $hashedPass = $mySQLI->escape_string(password_hash($newPass, PASSWORD_BCRYPT));

        $sql = "UPDATE user_accounts SET u_pass = ? WHERE u_hash = ?";
        $stmt = mysqli_stmt_init($mySQLI);
        if(mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ss', $hashedPass, $hash);
            mysqli_stmt_execute($stmt);
        }
        header('location: main.php?reset_success');
        exit();
    }
