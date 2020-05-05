<?php include_once '../../header.php'; ?>

<?php
    $pharmacy = $_SESSION['companyID'];
    $fetchSchedule = "SELECT week_start, schedule_array FROM emp_schedule WHERE pharm_id = '$pharmacy'";
    $result = mysqli_query($mySQLI, $fetchSchedule);

    //Getting the employees
    $sql = "SELECT * FROM employee WHERE pharm_id = $pharmacy";
    $empResult = mysqli_query($mySQLI, $sql);
	if($empResult->num_rows > 0)
	{
        $scheduleRecord = mysqli_fetch_array($result);
        $start = $scheduleRecord['week_start'];
        $schedule = $scheduleRecord['schedule_array'];
        $schedule = unserialize($schedule);
	}

    $year = substr($start, 0, 4) . '-' .
    $month = substr($start, 5, 2) . '-' .
    $day = substr($start, 8, 2);
?>

<link rel="stylesheet" href="css/schedule.css">
<title>Employee Schedules</title>
<div class="container">
	<h1 style="text-align: center">WEEKLY SCHEDULE</h1>
	<div class="table-container">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Employee</th>
	            <?php for($i = 0; $i < 7; $i++): ?>
					<th>
	                    <?php echo date("l", mktime(0, 0, 0, intval($month), intval($day+$i), intval($year)));?>
	                    <?php echo date('m-d-Y', mktime(0, 0, 0, intval($month), intval($day+$i), intval($year))); ?>
					</th>
	            <?php endfor; ?>
			</tr>
		</thead>
		<tbody>
            <?php $i = 0; while($emp = mysqli_fetch_assoc($empResult)): ?>
			<tr>
				<th>
                    <?php echo $emp['emp_first'] . ' ' . $emp['emp_last']; ?>
				</th>
                <?php for($j = 0; $j < 7; $j++): ?>
				<td>
					<?php $from = $schedule[$i][$j]['START'];  $to = $schedule[$i][$j]['END'];?>
					<p style="<?php if($from != null && $to != null)echo 'background-color: #abf300';
                                    if($from == null || $to == null)echo 'background-color: #ffbd00';
                                    if($from == '-' && $to == '-')echo 'background-color: '; ?>">
						<strong>
                            <?php if($from != null) echo date("h:i A", strtotime($from)); ?>
							<br>
							<strong>-</strong>
							<br>
                            <?php if($to != null) echo date("h:i A", strtotime($to)); ?>
						</strong>
					</p>
				</td>
                <?php endfor; ?>
			</tr>
	        <?php $i++; endwhile; ?>
		</tbody>
	</table>
	</div>
	<?php if($_SESSION['userType'] == 'ADMIN'): ?>
		<a href="edit_schedule.php"><button class="btn btn-primary">Edit Schedule</button></a>
	<?php endif; ?>
</div>

<?php include_once '../../footer.php'; ?>
