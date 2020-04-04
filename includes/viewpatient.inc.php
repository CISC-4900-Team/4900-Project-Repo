<?php
    require_once 'database_info.inc.php';
    if (isset($_GET['patient'])) {
        $pid = $_GET['patient'];
    }

    $sql = "SELECT * FROM patients WHERE p_id = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'SQL Statement Failed';
    } else {
        mysqli_stmt_bind_param($stmt, 's', $pid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $record = mysqli_fetch_array($result);
    }
