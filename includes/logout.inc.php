<?php
    $htmlRoot = 'https://equinoxpharma.herokuapp.com';
    session_start();
    session_unset();
    session_destroy();
    //header('location: ../index.php?loggedout');
    header("location: $htmlRoot/index.php?loggedout");
    exit;