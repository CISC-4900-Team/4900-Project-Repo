<?php
    require_once 'database_info.inc.php';

    $query = $_POST['patient_query'];

    $record = null;
    $sql = "SELECT * FROM patients WHERE ? IN(p_id, p_first, p_last)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'SQL Statement Failed';
    } else {
        mysqli_stmt_bind_param($stmt, 's', $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $record = mysqli_fetch_array($result);
    }
