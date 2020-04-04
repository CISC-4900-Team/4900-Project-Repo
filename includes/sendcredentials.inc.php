<?php
    require_once 'database_info.inc.php';
    require_once 'mailer.inc.php';

    $mail->SetFrom('equinoxpharmacysystems@gmail.com', 'Equinox Systems');
    $mail->Subject = 'Equinox Account Verification';
    $mail->Body = "
                    <h3>Your email has been verified</h3>
                    <h3>Your email has been verified</h3><br><br>
                    <p>Please click this <a href='$link$hash'>verification</a> link to verify your email</p><br>
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