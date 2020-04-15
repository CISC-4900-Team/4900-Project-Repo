<?php include_once '../../header.php'; ?>
<?php require_once '../../includes/database_info.inc.php'; ?>

<?php
	$record = null;
	if(isset($_GET['pid']))
	{
		$patient = $_GET['pid'];
        $sql = "SELECT * FROM patients WHERE p_id = ?";
		$stmt = mysqli_stmt_init($mySQLI);
		if(mysqli_stmt_prepare($stmt, $sql))
		{
	        mysqli_stmt_bind_param($stmt, 's', $patient);
	        mysqli_stmt_execute($stmt);
	        $result = mysqli_stmt_get_result($stmt);
	    }
	    $record = mysqli_fetch_array($result);
	}
?>

<link rel="stylesheet" href="css/view_patient.css">
<div class="container mb-3 mt-3">
	<div class="row align-items-center heading">
		<div class="col-sm-2">
			<a href="patient_lookup.php"><button class="btn btn-primary">Back</button></a>
		</div>
		<div class="col-sm-8">
			<h1>Patient Information</h1>
		</div>
	</div>
	<!-- Basic Patient info -->
	    <table class="table table-striped table-bordered table-hover" id="mydata" style="width: 100%">
	        <thead>
	            <th>Patient ID</th>
	            <th>Full Name</th>
	            <th>Address</th>
	            <th>DOB</th>
	            <th>Phone Number</th>
	            <th>sex</th>
	            <th>Allergies</th>
	        </thead>
	        <tbody>
	            <tr>
	                <td><?php echo $record['p_id']; ?></td>
	                <td><?php if(isset($record)){echo strtoupper($record['p_first'] . ' ' . $record['p_last']);} else echo 'N/A'; ?></td>
	                <td><?php if(isset($record)){echo strtoupper($record['p_addr'] . ', ' . $record['p_city'] . ', ' . $record['p_state'] . ', ' . $record['p_zip']);} else echo 'N/A'; ?></td>
	                <td><?php if(isset($record))echo $record['p_dob']; ?></td>
	                <td>
	                    <?php if(isset($record))
	                    {
                            $areaCode = substr($record['p_phone'], 0, 3);
                            $prefix = substr($record['p_phone'], 3, 3);
                            $line = substr($record['p_phone'], 6, 4);
                            echo "(" . $areaCode . ") " . $prefix . "-" . $line;
                        }
                        else echo 'N/A';
	                    ?>
	                </td>
	                <td><?php if(isset($record))echo strtoupper($record['p_sex']); else echo 'N/A'; ?></td>
	                <td><?php if(isset($record))echo strtoupper($record['allergies']); else echo 'N/A'; ?></td>
	            </tr>
	        </tbody>
	    </table>
	<!-- Insurance info-->
	<table class="table table-striped table-bordered" id="mydata" style="width: 100%">
	        <thead>
	            <th>Provider Name</th>
	            <th>Policy Number</th>
	            <th>Deductible</th>
	        </thead>
	        <tbody>
	            <tr>
	                <td><?php if(isset($record))echo strtoupper($record['insurer']); else echo 'N/A'; ?></td>
	                <td><?php if(isset($record))echo strtoupper($record['policy_num']); else echo 'N/A'; ?></td>
	                <td><?php if(isset($record))echo '$'.strtoupper($record['ins_deductible']); else echo 'N/A'; ?></td>
	            </tr>
	        </tbody>
	    </table>
	<!-- Primary Care info-->
	<table class="table table-striped table-bordered table-hover" id="mydata" style="width: 100%">
	        <thead>
	            <th>Physician Name</th>
	            <th>Office Address</th>
	            <th>Office Phone Number</th>
	        </thead>
	        <tbody>
	            <tr>
	                <td><?php if(isset($record))echo strtoupper($record['pcp_name']); else echo 'N/A'; ?></td>
	                <td><?php if(isset($record))echo strtoupper($record['pcp_addr']); else echo 'N/A'; ?></td>
	                <td>
                        <?php if(isset($record))
                        {
                            $areaCode = substr($record['pcp_phone'], 0, 3);
                            $prefix = substr($record['pcp_phone'], 3, 3);
                            $line = substr($record['pcp_phone'], 6, 4);
                            if(isset($record)) echo "(" . $areaCode . ") " . $prefix . "-" . $line;
                        }
                        else echo 'N/A';
	                    ?>
	                </td>
	            </tr>
	        </tbody>
	    </table>

	<!-- Prescription info -->
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
</div>

<?php include_once '../../footer.php'; ?>