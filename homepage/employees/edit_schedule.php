<?php include_once '../../header.php'; ?>
<?php include '../../includes/database_info.inc.php'; ?>

<?php
    //Setting date parameters
    if(isset($_POST['date']))
        $_SESSION['schedule_date'] = $_POST['date'];

    $year = substr($_SESSION['schedule_date'], 0, 4) . '-' .
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
    $schedule = array();
    $start = null;
    $end = null;
?>

<link rel="stylesheet" href="css/schedule.css">
<title>Employee Schedules</title>
<div class="container">
    <h1>WEEKLY SCHEDULE</h1>
    <form method="post" action="" name="calender">
        <div class="row align-items-center">
            <div class="form-group col-sm-2">
                <input type="date" class="form-control" name="date" value="<?php date_default_timezone_set('US/Eastern'); echo $_SESSION['schedule_date'];?>">
            </div>
            <div class="form-group col-sm-2">
                <input type="submit" class="form-control" formtarget="calender" value="Set Week Start">
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <?php for($i = 0; $i < 7; $i++): ?>
                <th>
                    <?php echo date("l", mktime(0, 0, 0, intval($month), intval($day+$i), intval($year)));?>
                    <br>
                    <?php echo date('m-d-Y', mktime(0, 0, 0, intval($month), intval($day+$i), intval($year))); ?>
                </th>
            <?php endfor; ?>
        </tr>
        </thead>
        <tbody>
        <?php $count = 0; while($record = mysqli_fetch_assoc($result)): ?>
            <tr>
                <th>
                    <?php
                        echo $record['emp_first'] . " " . $record['emp_last'];
                        $schedule[$count] = array(
                            "ID"=>$record['emp_id']
                        );
                    ?>
                </th>
                <?php for($i = 0; $i < 7; $i++): ?>
                    <td>
                        <div class="container" style="width: 150px;">
                            <div class="form-row">
                                <form action="" method="post" id="timeSchedule">
                                    <input type="text" class="form-control" name="<?php echo "start$i"; ?>">
                                    <input type="text" class="form-control" name="<?php echo "end$i"; ?>">
                                </form>
                            </div>
                        </div>
                    </td>
                <?php
                    if(isset($_POST["start$i"]))
                        $start = $_POST["start$i"];
                    if(isset($_POST["end$i"]))
                        $end = $_POST["end$i"];
                    endfor;
                ?>
            </tr>
        <?php  array_push($schedule[$count], array("Start"=>$start, "End"=> $end)); $count++;?>
        </tbody>
    </table>
    <button class="btn btn-primary" form="timeSchedule" name="save">Save Schedule</button>
</div>
<?php
    if(isset($_POST['save']))
    {
        print_r($schedule);
    }
?>
<?php include_once '../../footer.php'; ?>
