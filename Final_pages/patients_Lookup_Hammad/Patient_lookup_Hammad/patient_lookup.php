<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/header.inc.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/crud_includes/pop_patients.inc.php'; ?>
<link rel="stylesheet" href="patient_lookup_style.css">
<title>Patient Lookup</title>

<div class="container">
	<h1><a href="patient_lookup.php">Patient Lookup</a></h1>
		<hr>
		<div class="row">
			<div class="col">
				<table class="table hover table-striped" id="users_table">
					<thead>
					<tr>
						<th>#</th>
						<th id="p_name">First Name</th>
						<th id="p_name">Last Name</th>
						<th id="p_dob">D-O-B</th>
						<th id="p_addr">Address</th>
						<th id="p_city">City</th>
						<th id="p_state">State</th>
						<th id="p_zip">Zip</th>
						<th id="p_insurer">Insurer</th>
						<th id="view_del">View</th>
						<th id="view_del">Delete</th>
					</tr>
					</thead>
					<tbody>
                    <?php $count = 1; while($row = mysqli_fetch_array($dataResult)): ?>
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
							<td><form action="" method="get"><button type="submit" name="view_patient" value="<?php echo $row['p_id']; ?>" class="btn fas fa-eye""></button></form></td>
							<td><form action="" method="get"><button type="submit" name="delete_patient" value="<?php echo $row['p_id']; ?>" class="btn fas fa-trash-alt""></button></form></td>
						</tr>
                        <?php $count++; endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
