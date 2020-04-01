<?php include
    $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db_includes/patientSchema.inc.php';

    //Get the ID of record to show
    $id = $_GET['pid'];
    $patientSQL = "SELECT * FROM patient_info WHERE pid = $id";
    $result = mysqli_query($pSQLI, $patientSQL);
    $record = mysqli_fetch_assoc($result);

    /*
    //Check whether the user accessing the patient has authorization
    $pharmacyID = $_SESSION['companyID'];
    if($pharmacyID != $record['pharm_id'])
    {
        header('location: ../../401_unauthorized.php?confidential');
        exit();
    }
	else
	{
        if(isset($_POST['edit_patient']))
        {
            header('location: edit_patient.php?pid='.$id);
            exit();
        }
	}*/
?>

<link rel="stylesheet" href="../../stylesheets/crud_styles/patient_page_style.css">
<title>Patient Information</title>
<div class="container">
	<a href="patient_lookup.php"><button>Back</button></a>
	<h1><strong>Patient Information</strong></h1>
    <h4><strong>PATIENT ID:</strong> <?php echo $id; ?></h4>
    <h4><strong>NAME:</strong> <?php echo strtoupper($record['p_first'] . ' ' . $record['p_last']); ?></h4>
	<h4><strong>D-O-B:</strong> <?php echo $record['p_dob']; ?></h4>
    <h4><strong>ADDRESS:</strong> <?php echo strtoupper($record['p_addr'] . ', ' . $record['p_city'] . ', ' . $record['p_state'] . ', ' . $record['p_zip']); ?></h4>
	<h4><strong>PHONE NUMBER:</strong>
		<?php
			$areaCode = substr($record['p_phone'], 0, 3);
            $prefix = substr($record['p_phone'], 3, 3);
            $line = substr($record['p_phone'], 6, 4);
			echo "(".$areaCode.") ".$prefix."-".$line;
		?>
	</h4>
	<h4><strong>ALLERGIES:</strong> <?php echo strtoupper($record['allergies']); ?> </h4>
	<hr>
	<h3><strong>Insurance Information</strong></h3>
	<h4><strong>INSURER:</strong> <?php echo strtoupper($record['insurer']); ?> </h4>
	<h4><strong>INSURANCE ID:</strong> <?php echo 'TO-DO'; ?> </h4>
	<hr>
	<h3><strong>Primary Care Information</strong></h3>
	<h4><strong>PHYSICIAN:</strong> <?php echo strtoupper($record['primary_physician']); ?> </h4>
	<h4><strong>ADDRESS:</strong> <?php echo strtoupper($record['physician_addr']); ?> </h4>
	<h4><strong>PHYSICIAN NUMBER:</strong>
        <?php
            $areaCode = substr($record['physician_phone'], 0, 3);
            $prefix = substr($record['physician_phone'], 3, 3);
            $line = substr($record['physician_phone'], 6, 4);
            echo "(".$areaCode.") ".$prefix."-".$line;
        ?>
	</h4>

	<form action="" method="post">
		<div class="row">
			<div class="col-sm-2">
				<input type="submit" name="edit_patient" Value="Update Patient Information">
			</div>
			<div class="col-sm-1">
				<input type="submit" name="view_transaction" Value="Transaction History">
			</div>
		</div>
	</form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
