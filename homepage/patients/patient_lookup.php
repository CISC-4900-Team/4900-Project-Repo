<?php include_once '../../header.php'; ?>
<?php require_once 'includes/getpatients.inc.php'; ?>

<?php
    if(isset($_POST['view_patient'])) {
    	//$_SESSION['pid'] = $mySQLI->escape_string($_POST['view_patient']);
	    $pid = $_GET['view_patient'];
        //header('location:'.HTTP.'homepage/patients/view_patient.php?='.$pid);
        exit();
    }

    if(isset($_POST['delete_patient'])) {
        include_once '../../includes/deletepatient.inc.php';
    }
?>

<link rel="stylesheet" href="css/patient_lookup.css">
<title>Patient Lookup</title>
<div class="container">
	<h1><a href="patient_lookup.php">Patient Lookup</a></h1>
	<div class="container patient_table">
		<hr>
		<div class="row">
			<div class="col">
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
						<th id="p_insurer">Insurer</th>
						<th id="view_del">Action</th>
					</tr>
					</thead>
					<tbody>
                    <?php $count = 1;
                        while($row = mysqli_fetch_array($dataResult)): ?>
						<tr>
							<th><?php echo $count; ?></th>
							<td><?php echo $row['p_first']; ?></td>
							<td><?php echo $row['p_last']; ?></td>
							<td><?php echo $row['p_dob']; ?></td>
							<td><?php echo $row['p_addr']; ?></td>
							<td><?php echo $row['p_city']; ?></td>
							<td><?php echo $row['p_state']; ?></td>
							<td><?php echo $row['p_zip']; ?></td>
							<td><?php echo $row['insurer']; ?></td>
							<td>
								<div class="form-row">
									<a href="<?php echo HTTP?>/homepage/patients/view_patient.php?pid=<?php echo $row['p_id'];?>"><i class="btn fas fa-eye"></i></a>
									<form action="" method="get"><button type="submit" name="delete_patient" value="<?php echo $row['p_id']; ?>" class="btn fas fa-trash-alt""></button></form>
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

<?php include_once '../../footer.php'; ?>
