<?php include_once '../../header.php'; ?>
<?php
	//Getting all patients from `patients` table but only for the specific pharmacy
    $dataResult = mysqli_query($mySQLI, "SELECT * FROM patients WHERE pharm_id = ".$_SESSION['companyID']);

    if(isset($_POST['delete_patient']))
        include_once 'includes/deletepatient.inc.php';
?>

<link rel="stylesheet" href="css/patient_lookup.css">
<title>Patient Lookup</title>
<div class="container">
	<h1><a href="patient_lookup.php">Patient Lookup</a></h1>
	<div class="container patient_table">
		<hr>
		<div class="row">
			<div class="col" id="patientTable">
				<table id="patients_table" class="table table-striped" style="width:100%">
					<thead>
					<tr>
						<th></th>
						<th id="p_name">First Name</th>
						<th id="p_name">Last Name</th>
						<th id="p_dob">D-O-B</th>
						<th id="p_addr">Address</th>
						<th id="p_city">City</th>
						<th id="p_state">State</th>
						<th id="p_zip">Zip</th>
						<th id="view_del">Action</th>
					</tr>
					</thead>
					<tbody>
                    <?php $count = 1;
                        while($row = mysqli_fetch_array($dataResult)): ?>
						<tr>
							<th><?php echo $count; ?></th>
							<td><?php echo $row['patient_first']; ?></td>
							<td><?php echo $row['patient_last']; ?></td>
							<td><?php echo $row['dob']; ?></td>
							<td><?php echo $row['p_addr']; ?></td>
							<td><?php echo $row['p_city']; ?></td>
							<td><?php echo $row['p_state']; ?></td>
							<td><?php echo $row['p_zip']; ?></td>
							<td>
								<div class="form-row">
									<a href="<?php echo HTTP?>/homepage/patients/view_patient.php?pid=<?php echo $row['p_id'];?>"><i class="btn fas fa-eye"></i></a>
									<form action="" method="POST"><button type="submit" name="delete_patient" value="<?php echo $row['p_id']; ?>" class="btn fas fa-trash-alt""></button></form>
								</div>
							</td>
						</tr>
                        <?php $count++; endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
        $('#patients_table').DataTable();
	});
</script>
<?php include_once '../../footer.php'; ?>
