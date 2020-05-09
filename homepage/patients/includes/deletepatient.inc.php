<?php
    //Get the patient ID to delete
    $pid = $mySQLI->escape_string($_POST['delete_patient']);

    //Delete patient record from patients
    $sql = "DELETE FROM patients WHERE p_id = ?";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 's', $pid);
        mysqli_stmt_execute($stmt);
        header('location: patient_lookup.php?patient_delete=success');
        exit();
    }
