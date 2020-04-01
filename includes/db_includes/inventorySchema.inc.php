<?php
    //MySQL Database Connection Information
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "2321456";
    $dbName = "inventory";

    //Create connection to database
    $invSQLI = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
?>