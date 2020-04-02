<?php
    //Heroku MySQL Database Connection Information
    $dbServername = 'us-cdbr-iron-east-01.cleardb.net';
    $dbUsername = 'ba82d15ce863ba';
    $dbPassword = 'ef3322f0';
    $dbName = 'heroku_2d00414f2e3f743';

    //Create connection to database
    $mySQLI = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
?>
