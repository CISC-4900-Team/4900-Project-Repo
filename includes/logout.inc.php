<?php
    session_start();
    session_unset();
    session_destroy();
    header('location: ' . HTTP . 'index.php?loggedout');
    exit;