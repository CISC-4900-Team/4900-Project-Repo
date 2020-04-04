<?php
    require_once 'database_info.inc.php';
    $pid = $mySQLI->escape_string($_POST['delete_patient']);

    $sql = "DELETE FROM patients WHERE p_id = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'SQL Statement Failed';
    } else {
        mysqli_stmt_bind_param($stmt, 's', $pid);
        mysqli_stmt_execute($stmt);
        header('location: patient_lookup.php?patient_delete=success');
        exit();
    }