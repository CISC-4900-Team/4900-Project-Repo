<?php
    include '../../../config.php';
    //Get the product UPC and quantity from the URL
    $upc = $_GET['p'];
    $quantity = $_GET['q'];

    //Query the `medication_inventory` to check if product exists and quantity is sufficient
    $getProductSQL = "SELECT * FROM medication_inventory WHERE upc = '$upc' AND qty_stock >= '$quantity'";
    $result = mysqli_query($mySQLI, $getProductSQL);
    $row = mysqli_fetch_array($result);
    $total = floatval($quantity * $row['msrp']);

    //Echo the product information, separated by a comma so it can be processed by the AJAX
    //Response text in transactionScript.js
    echo $quantity . ',' . $row['med_name']. ' '.$row['potency'] . ',' . $total;
