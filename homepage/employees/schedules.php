<?php include_once '../../header.php'; ?>
<?php include '../../includes/database_info.inc.php'; ?>

<?php
	echo $year = substr($_SESSION['schedule_date'], 0, 4) . '-' .
	$month = substr($_SESSION['schedule_date'], 5, 2) . '-' .
	$day = substr($_SESSION['schedule_date'], 8, 2);

	//Getting employees
	echo $pharmacy = $_SESSION['companyID'];
	$sql = "SELECT * FROM employees WHERE pharm_id = ?";
	$stmt = mysqli_stmt_init($mySQLI);

	if(mysqli_stmt_prepare($stmt, $sql))
	{
        mysqli_stmt_bind_param($stmt, 's', $pharmacy);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
	}

	$_SESSION['schedule'] = array
	(
			array("Hammad", )
	);

?>

<link rel="stylesheet" href="css/schedule.css">
<title>Employee Schedules</title>
<div class="container">
	<h1>WEEKLY SCHEDULE</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th></th>
				<?php for($i = 0; $i < 7; $i++): ?>
					<th>
                        <?php echo date("l", mktime(0, 0, 0, intval($month), intval($day+$i), intval($year)));?>
						<?php echo date('m-d-Y', mktime(0, 0, 0, intval($month), intval($day+$i), intval($year))); ?>
					</th>
				<?php endfor; ?>
			</tr>
		</thead>
		<tbody>
            <?php while($record = mysqli_fetch_assoc($result)): ?>
                <tr>
					<th><?php echo $record['emp_first'] . " " . $record['emp_last']; ?></th>
	                <?php for($i = 0; $i < 7; $i++): ?>
						<td>-</td>
                    <?php endfor; ?>
                </tr>
            <?php endwhile; ?>
		</tbody>
	</table>
	<a href="edit_schedule.php"><button class="btn btn-primary">Edit Schedule</button></a>
</div>

<?php include_once '../../footer.php'; ?>
