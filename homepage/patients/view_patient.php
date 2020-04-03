<?php //include 'C:\Users\Home\Documents\PharmaSystem\includes\header.inc.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/header.inc.php'; ?>
<?php include 'C:\Users\Home\Documents\PharmaSystem\includes\crud_includes\viewpatient.inc.php'; ?>
<link rel="stylesheet" href="../../stylesheets/crud_styles/patient_page_style.css">
<title>Patient Information</title>

<div class="container">
	<a href="patient_lookup.php"><button>Back</button></a>
	<h1><strong>Patient Information</strong></h1>
    <h4><strong>PATIENT ID:</strong> <?php echo $record['p_id']; ?></h4>
    <h4><strong>NAME:</strong> <?php echo strtoupper($record['p_first'] . ' ' . $record['p_last']); ?></h4>
	<h4><strong>D-O-B:</strong> <?php echo $record['p_dob']; ?></h4>
    <h4><strong>ADDRESS:</strong> <?php echo strtoupper($record['p_addr'] . ', ' . $record['p_city'] . ', ' . $record['p_state'] . ', ' . $record['p_zip']); ?></h4>
	<h4><strong>PHONE NUMBER:</strong>
		<?php
			$areaCode = substr($record['p_phone1'], 0, 3);
            $prefix = substr($record['p_phone1'], 3, 3);
            $line = substr($record['p_phone1'], 6, 4);
			echo "(".$areaCode.") ".$prefix."-".$line;
		?>
	</h4>
	<h4><strong>PHONE NUMBER 2:</strong>
        <?php
            $areaCode = substr($record['p_phone2'], 0, 3);
            $prefix = substr($record['p_phone2'], 3, 3);
            $line = substr($record['p_phone2'], 6, 4);
            echo "(".$areaCode.") ".$prefix."-".$line;
        ?>
	</h4>
	<h4><strong>EMAIL:</strong> <?php echo strtoupper($record['p_email']); ?> </h4>
	<h4><strong>ALLERGIES:</strong> <?php echo strtoupper($record['allergies']); ?> </h4>
	<hr>
	<h3><strong>Insurance Information</strong></h3>
	<h4><strong>INSURER:</strong> <?php echo strtoupper($record['insurer']); ?> </h4>
	<h4><strong>INSURANCE ID:</strong> <?php echo 'TO-DO'; ?> </h4>
	<hr>
	<h3><strong>Primary Care Information</strong></h3>
	<h4><strong>PHYSICIAN:</strong> <?php echo strtoupper($record['pcp_name']); ?> </h4>
	<h4><strong>ADDRESS:</strong> <?php echo strtoupper($record['pcp_addr']); ?> </h4>
	<h4><strong>PHYSICIAN NUMBER:</strong>
        <?php
            $areaCode = substr($record['pcp_phone'], 0, 3);
            $prefix = substr($record['pcp_phone'], 3, 3);
            $line = substr($record['pcp_phone'], 6, 4);
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
