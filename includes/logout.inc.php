<?php
    session_start();
    //Setting employee's last logout
    date_default_timezone_set('US/Eastern');
    $timeStamp = date('Y-m-d h:i:s', time());
    $userID = $_SESSION['employeeID'];
    $lastLoginID = $_SESSION['last_login_id'];
    $sql = "UPDATE login_records SET last_logout = '$timeStamp' WHERE id = '$lastLoginID'";
    mysqli_query($mySQLI, $sql);

    //Unsetting the session and destroying session variables
    session_unset();
    session_destroy();

    //Redirect back to index once user logs out
    header('location: ' . HTTP . 'index.php?loggedout');
    exit;