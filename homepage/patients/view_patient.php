<?php include_once '../../header.php'; ?>
<?php include_once '../../includes/viewpatient.inc.php'; ?>

<?php
	if(isset($_POST['edit_patient'])) {
		$_SESSION['p_edit'] = $record['p_id'];
		header('location: edit_patient.php?pid='.$record['p_id']);
		exit();
	}

	if(isset($_POST['view_transactions'])) {

	}
?>

<link rel="stylesheet" href="../../stylesheets/crud_styles/patient_page_style.css">
<title>Patient Information</title>
<div class="container">
	<a href="patient_lookup.php"><button>Back</button></a>
	<h1><strong>Patient Information</strong></h1>
    <h4><strong>PATIENT ID:</strong> <?php echo $record['p_id']; ?></h4>
    <h4><strong>NAME:</strong> <?php echo strtoupper($record['p_first'] . ' ' . $record['p_last']); ?></h4>
	<h4><strong>D-O-B:</strong> <?php echo $record['p_dob']; ?></h4>
    <h4><strong>ADDRESS:</strong> <?php echo strtoupper($record['p_addr'] . ', ' . $record['p_city'] . ', ' . $record['p_state'] . ', ' . $record['p_zip']); ?></h4>
	<h4><strong>PHONE NUMBER 1:</strong>
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
	<h4><strong>INSURANCE ID:</strong> <?php echo strtoupper($record['ins_id']); ?> </h4>
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
			<div class="col-sm-4">
				<button type="submit" name="edit_patient" value="<?php echo $record['p_id']; ?>" >Update Patient Information</button>
			</div>
			<div class="col-sm-4">
				<button type="submit" name="view_transactions" value="<?php echo $record['p_id']; ?>" >View Transaction History</button>
			</div>
		</div>
	</form>
</div>

<?php include_once '../../footer.php'; ?>

