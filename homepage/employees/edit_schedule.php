<?php include_once '../../header.php'; ?>

<?php
    $pharmacy = $_SESSION['companyID'];
    $_SESSION['schedule'] = array();

    //Getting the employees
    $sql = "SELECT * FROM employee WHERE pharm_id = $pharmacy";
    $empResult = mysqli_query($mySQLI, $sql);

    //Getting the schedule from the schedule table
    $sql = "SELECT week_start, schedule_array FROM emp_schedule WHERE pharm_id = '$pharmacy'";
    $scheduleResult = mysqli_query($mySQLI, $sql);
	if($scheduleResult->num_rows > 0)
	{
        $scheduleRecord = mysqli_fetch_array($scheduleResult);
        $schedule = unserialize($scheduleRecord['schedule_array']);
        $_SESSION['weekStart'] = $scheduleRecord['week_start'];
	}

	//Once save button is pressed fill the data in the array
    if(isset($_POST['saveBtn']))
    {
        for($i = 0; $i < 3; $i++)
    		for($j = 0; $j < 7; $j++)
    			if(isset($_POST['START'.$i.$j]) && isset($_POST['END'.$i.$j]))
                    $_SESSION['schedule'][$i][$j] = ["DAY-".$j, "START"=>$_POST['START' . $i . $j], "END"=>$_POST['END' . $i . $j]];

        $weekStart = $_POST['startDate'];
        $_SESSION['weekStart'] = $weekStart;
        //Serialize array so it can be stored in the database table
        $serializedArray = serialize($_SESSION['schedule']);
        $sql = "UPDATE emp_schedule SET schedule_array = '$serializedArray', week_start = '$weekStart' WHERE pharm_id = '$pharmacy'";
        mysqli_query($mySQLI, $sql);
        header('location: schedules.php');
	    exit();
    }
?>

<link rel="stylesheet" href="css/schedule.css">
<title>Employee Schedules</title>
<div class="container">
    <h1 style="text-align: center">EDIT SCHEDULE</h1>
	<form action="" method="post" id="schedule">
	    <div class="row">
		    <div class="col-sm-2">
			    <h3>Week Start:</h3>
		    </div>
	        <div class="form-group col-sm-2">
	            <input type="date" class="form-control" name="startDate" id="dateSelector" value="<?php echo $_SESSION['weekStart']; ?>" required>
	        </div>
	    </div>
		<div class="table-container">
	    <table class="table table-bordered">
	        <thead>
		        <tr id="weekDaysRow">
			        <th>Employee</th>
			        <?php for($i = 0; $i < 7; $i++):?>
						<th id="weekDaysHeading"></th>
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
						        From:
						        <input type="time" class="form-control" name="START<?php echo $i.$j; ?>" value="<?php echo $schedule[$i][$j]['START']; ?>">
						        To:
						        <input type="time" class="form-control" name="END<?php echo $i.$j; ?>" value="<?php echo $schedule[$i][$j]['END']; ?>">
					        </td>
	                    <?php endfor; ?>
			        </tr>
	            <?php $i++; endwhile; ?>
	        </tbody>
	    </table>
		</div>
		<a href="schedules.php"><button type="button" class="btn btn-primary">Back</button></a>
		<button type="submit" class="btn btn-primary" form="schedule" name="saveBtn">Save Schedule</button>
	</form>
</div>
<script src="js/scheduleScript.js"></script>
<?php include_once '../../footer.php'; ?>