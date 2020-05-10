<?php
    $transactionArray = array();
    if(isset($_POST['patientID'])) $patientID = $mySQLI->escape_string($_POST['patientID']);
    $transactionArray['PATIENT_ID'] = $patientID;
    $transacID = rand(10000000, 99999999);
    $transactionArray['TRANSAC_ID'] = 'EQ'.$transacID;
    $transactionArray['DATE'] = '2020-05-10';
    $transactionArray['ITEM'][0] = ['VICODIN', '10', '$11.49'];
    $transactionArray['ITEM'][1] = ['Amoxicillin', '8', '$141.49'];
    $transactionArray['ITEM'][2] = ['Lorazepam', '15', '$1.49'];
    $transactionArray['ITEM'][3] = ['Zoloft', '1', '13.49'];


    print_r($transactionArray);
    echo $patientID;
