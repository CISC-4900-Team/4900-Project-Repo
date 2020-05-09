<?php
    //This script sets the PHPMailer variables to be used for emailing purposes
    //PHPMailer is an open source PHP mailing library available on Github
    require_once ROOT.'/PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
    $mail->SMTPAutoTLS = false;
    $mail->Host = gethostbyname('smtp.gmail.com');
    $mail->Hostname = 'localhost.localdomain';
    $mail->Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->isHTML(true);
    $mail->Username = 'equinoxpharmacysystems@gmail.com'; //Your email
    $mail->Password = '123456'; //Email account password, real password was removed