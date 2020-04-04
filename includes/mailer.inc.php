<?php
    require_once 'PHPMailer/PHPMailerAutoload.php';
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
    $mail->Username = 'equinoxpharmacysystems@gmail.com';
    $mail->Password = '2321456HTm';