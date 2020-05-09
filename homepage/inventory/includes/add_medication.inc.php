<?php
    //Get the medication information from the form, sanitize with escape_string
    if(isset($_POST['med_name'])) echo $med_name = strtoupper($mySQLI->escape_string($_POST['med_name']));
    if(isset($_POST['mfg_name'])) echo $manufacturer = strtoupper($mySQLI->escape_string($_POST['mfg_name']));
    if(isset($_POST['mfg_addr'])) echo $mfg_addr = strtoupper($mySQLI->escape_string($_POST['mfg_addr']));
    if(isset($_POST['mfg_phone'])) echo $mfg_phone = strtoupper($mySQLI->escape_string($_POST['mfg_phone']));
    if(isset($_POST['msrp'])) echo $msrp = $mySQLI->escape_string($_POST['msrp']);
    if(isset($_POST['potency'])) echo $potency = strtoupper($mySQLI->escape_string($_POST['potency']));
    if(isset($_POST['side_effects'])) echo $side_effects = strtoupper($mySQLI->escape_string($_POST['side_effects']));
    if(isset($_POST['description'])) echo $description = strtoupper($mySQLI->escape_string($_POST['description']));
    if(isset($_POST['barcode'])) echo $barcode = $mySQLI->escape_string($_POST['barcode']);
    if(isset($_POST['quantity'])) echo $quantity = $mySQLI->escape_string($_POST['quantity']);
    if(isset($_POST['unit_price'])) echo $unit_price = $mySQLI->escape_string($_POST['unit_price']);
    if(isset($_POST['order_number'])) echo $order_number = $mySQLI->escape_string($_POST['order_number']);

    //Add medication data into the `medication_inventory` table
    $sql = "INSERT INTO medication_inventory (med_name, manufacturer, mfg_address, mfg_phone, msrp, potency, side_effects,
                                  description, upc, qty_stock, unit_price, order_invoice, pharm_id)
            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($mySQLI);
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, 'sssssssssssss', $med_name, $manufacturer, $mfg_addr, $mfg_phone, $msrp,
            $potency, $side_effects, $description, $barcode, $quantity, $unit_price, $order_number, $_SESSION['companyID']);
        mysqli_stmt_execute($stmt);
    }
    header('location: medication_inventory.php?'.$barcode.'_added');
    exit();