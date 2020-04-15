<?php
    define("ROOT", __DIR__ ."/");
    define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
        ? "http://localhost/PharmaSystem/"
        : "https://equinoxpharma-dev.herokuapp.com/"
    );
    //Global includes definition
    define("INCLUDES", ROOT.'includes/');
