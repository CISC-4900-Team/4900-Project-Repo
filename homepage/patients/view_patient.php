<?php include_once '../../header.php'; ?>

<?php
    $p_record = null;
    //Check if the patient ID is set in the URL
	if(isset($_GET['pid']))
	{
		//Get the patient information from the database
		$patient = $_GET['pid'];
        $sql = "SELECT * FROM patients WHERE p_id = ?";
		$stmt = mysqli_stmt_init($mySQLI);
		if(mysqli_stmt_prepare($stmt, $sql))
		{
	        mysqli_stmt_bind_param($stmt, 's', $patient);
	        mysqli_stmt_execute($stmt);
	        $result = mysqli_stmt_get_result($stmt);
	    }
	    $p_record = mysqli_fetch_array($result);

		//getting patient insurance information
        $sql = "SELECT * FROM insurance WHERE policy_number = ".$p_record['insurance_id'];
        $insResult = mysqli_query($mySQLI, $sql);
        $insurance = mysqli_fetch_array($insResult);
	}
?>

<title>Patient Information</title>
<link rel="stylesheet" href="css/view_patient.css">
<div class="container mb-3 mt-3">
	<h1 style="text-align: center">Patient #<?php echo $p_record['p_id']; ?></h1>
	<div class="container patient-table" style="margin-bottom: 10px;">
		<div class="row">
			<div class="col-sm-3" style="border: 1px solid #dee2e6;">
				<p><strong>Full Name</strong></p>
			</div>
			<div class="col-sm-1" style="border: 1px solid #dee2e6;">
				<p><strong>Sex</strong></p>
			</div>
			<div class="col-sm-2" style="border: 1px solid #dee2e6;">
				<p><strong>D-O-B</strong></p>
			</div>
			<div class="col" style="border: 1px solid #dee2e6;">
				<p><strong>Full Address</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($p_record)){echo $p_record['patient_first'] . ' ' . $p_record['patient_last'];} else echo 'N/A'; ?></p>
			</div>
			<div class="col-sm-1" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($p_record))echo $p_record['sex']; else echo 'N/A'; ?></p>
			</div>
			<div class="col-sm-2" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($p_record))echo $p_record['dob']; ?></p>
			</div>
			<div class="col" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($p_record)){echo $p_record['p_addr'] . ', ' . $p_record['p_city'] . ', ' . $p_record['p_state'] . ', ' . $p_record['p_zip'];} else echo 'N/A'; ?></p>
			</div>
		</div>
	</div>
	<div class="container patient-table" style="margin-bottom: 15px;">
		<div class="row">
			<div class="col-sm-2" style="border: 1px solid #dee2e6;">
				<p><strong>Phone Number</strong></p>
			</div>
			<div class="col-sm-4" style="border: 1px solid #dee2e6;">
				<p><strong>Email</strong></p>
			</div>
			<div class="col" style="border: 1px solid #dee2e6;">
				<p><strong>Allergies</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2" style="border: 1px solid #dee2e6; background-color: #f2f2f2;">
				<p><?php if(isset($p_record)) echo $p_record['phone']; else echo 'N/A'; ?></p>
			</div>
			<div class="col-sm-4" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($p_record))echo $p_record['p_email']; else echo 'N/A'; ?></p>
			</div>
			<div class="col" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($p_record))echo $p_record['allergies']; else echo 'N/A'; ?></p>
			</div>
		</div>
	</div>

	<h3 style="text-align: center">Insurance Information</h3>
	<div class="container insurance-table" style="margin-bottom: 15px;">
		<div class="row">
			<div class="col-sm-2" style="border: 1px solid #dee2e6;">
				<p><strong>Policy Number</strong></p>
			</div>
			<div class="col-sm-4" style="border: 1px solid #dee2e6;">
				<p><strong>Provider</strong></p>
			</div>
			<div class="col-sm-2" style="border: 1px solid #dee2e6;">
				<p><strong>Deductible</strong></p>
			</div>
			<div class="col-sm-2" style="border: 1px solid #dee2e6;">
				<p><strong>Start Date</strong></p>
			</div>
			<div class="col-sm-2" style="border: 1px solid #dee2e6;">
				<p><strong>End Date</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($insurance))echo $insurance['policy_number']; else echo 'N/A'; ?></p>
			</div>
			<div class="col-sm-4" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($insurance))echo $insurance['insurance_name']; else echo 'N/A'; ?></p>
			</div>
			<div class="col-sm-2" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($insurance))echo '$'.$insurance['deductible']; else echo 'N/A'; ?></p>
			</div>
			<div class="col-sm-2" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($insurance))echo $insurance['start_date']; else echo 'N/A'; ?></p>
			</div>
			<div class="col-sm-2" style="border: 1px solid #dee2e6; background-color: #f2f2f2">
				<p><?php if(isset($insurance))echo $insurance['exp_date']; else echo 'N/A'; ?></p>
			</div>
		</div>
	</div>
	<h3 style="text-align: center">Last Prescription</h3>
	<table class="table table-striped table-bordered table-hover" id="mydata" style="width: 100%">
	    <thead>
	        <th>Medication Name</th>
	        <th>Date_Issued</th>
	        <th>Expiration</th>
	        <th>Num_pills</th>
	        <th>Refill_Count</th>
	    </thead>
	    <tbody>
	        <tr>
	            <td>Amoxicillin</td>
	            <td>01/20/2020</td>
	            <td>08/13/2020</td>
	            <td>60</td>
	            <td>2</td>
	        </tr>
	    </tbody>
    </table>
	<div class="row justify-content-center">
		<a href="patient_lookup.php"><button class="btn btn-dark" style="font-size: 20px">Back</button></a>
		<a href="edit_patient.php?pid=<?php echo $p_record['p_id']; ?>"><button class="btn btn-primary" style="font-size: 20px; margin-left: 8px;">Edit Patient</button></a>
	</div>

</div>

<?php include_once '../../footer.php'; ?>