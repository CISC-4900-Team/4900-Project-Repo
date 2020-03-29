<?php include
    $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/patientSchema.inc.php';

    //Get the ID of record to show
    $id = $_GET['pid'];
    $patientSQL = "SELECT * FROM patient_info WHERE pid = $id";
    $result = mysqli_query($pSQLI, $patientSQL);
    $record = mysqli_fetch_assoc($result);
?>

<link rel="stylesheet" href="../../stylesheets/crud_styles/patient_page_style.css">
<title>Patient Information</title>
<div class="container">
	<a href="patient_lookup.php"><button>Back</button></a>
    <h1>Patient Information</h1>
    <h3>Patient ID: <?php echo $id; ?></h3>
    <h3>Name: <?php echo $record['p_first'] . ' ' . $record['p_last']; ?></h3>
    <h3>Address: <?php echo $record['p_addr'] . ', ' . $record['p_city'] . ', ' . $record['p_state'] . ', ' . $record['p_zip']; ?></h3>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
