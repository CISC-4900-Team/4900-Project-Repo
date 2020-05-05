<?php
    //Configuration File

    //Defining global variables
    define("ROOT", __DIR__ ."/");
    define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
        ? "http://localhost/PharmaSystem/"
        : "https://equinoxpharma-dev.herokuapp.com/"
    );

    //Global includes definition
    define("INCLUDES", ROOT.'includes/');

    //Defining database connection information
    if($_SERVER["SERVER_NAME"] == "localhost")
    {
        $dbServername = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '2321456';
        $dbName = 'pharmcy_db_final';
    }
    else
    {
        $dbServername = 'us-cdbr-iron-east-01.cleardb.net';
        $dbUsername = 'ba82d15ce863ba';
        $dbPassword = 'ef3322f0';
        $dbName = 'heroku_2d00414f2e3f743';
    }
    //Create connection to database
    $mySQLI = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);