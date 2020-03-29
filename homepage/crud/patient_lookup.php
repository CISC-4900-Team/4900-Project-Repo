<?php include
	$_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/patientSchema.inc.php';

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $limit = 10;
    $offset = ($pageno - 1) * $limit;

    $pgCountSQL = "SELECT COUNT(*) FROM patient_info";
    $result = mysqli_query($pSQLI, $pgCountSQL);
    $totalRows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($totalRows / $limit);

    //Check if search button is pressed
    if(isset($_GET['search']))
    {
    	//Get the search query from the search form
        $query = $_GET['query'];

        $querySQL = "SELECT * FROM patient_info WHERE '$query' IN (p_first, p_last, p_sex, p_addr, p_zip, p_city, p_state, insurer)";
        $dataResult = mysqli_query($pSQLI, $querySQL);
    }
    else
    {
        $pagiSQL = "SELECT * FROM patient_info LIMIT $offset, $limit";
        $dataResult = mysqli_query($pSQLI, $pagiSQL);
    }

    //Check if user clicks delete
    if(isset($_GET['delete']))
    {
    	//Get the ID of record to delete
    	$id = $_GET['delete'];
    	$deleteSQL = "DELETE FROM patient_info WHERE pid = $id";
    	mysqli_query($pSQLI, $deleteSQL);
    	header('location: patient_lookup.php');
    }
    if(isset($_POST['add_patient']))
    {
	    header('location: add_patient.php');
    }
?>
<link rel="stylesheet" href="../../stylesheets/patient_lookup_style.css">
<title>Patient Lookup</title>

<div class="container">
	<h1><a href="patient_lookup.php">Patient Lookup</a></h1>
	<div class="content">
		<div class="row">
				<form class="searchbar" id="patient-search" method="get" action="patient_lookup.php?query">
					<div class="col-sm-7">
					<input type="text" name="query" placeholder="Search patient..." required>
					</div>
					<div class="col-sm-2">
						<button type="submit" name="search" form="patient-search" class="search-button">Search</button>
					</div>
				</form>
			<div class="col-sm-2">
				<form action="patient_lookup.php" method="post">
					<button type="submit" name="add_patient" class="add-btn">New Patient</button>
				</form>
			</div>
		</div>
		<hr>
		<!-- User table -->
		<table class="hover-table" id="users_table">
			<thead>
			<tr>
				<th>#</th>
				<th id="uname">First Name</th>
				<th id="uname">Last Name</th>
				<th id="dob">D-O-B</th>
				<th id="p_addr">Address</th>
				<th id="p_city">City</th>
				<th id="p_state">State</th>
				<th id="p_zip">Zip</th>
				<th id="insurer">Insurer</th>
				<th id="view">View</th>
				<th id="trash">Delete</th>
			</tr>
			</thead>
			<tbody>
                <?php $count = 1; while($row = mysqli_fetch_array($dataResult)): ?>
				<tr id="record">
					<th><?php echo $count; ?></th>
					<td id="uname"><?php echo $row['p_first']; ?></td>
					<td id="uname"><?php echo $row['p_last']; ?></td>
					<td id="dob"><?php echo $row['p_dob']; ?></td>
					<td id="p_addr"><?php echo $row['p_addr']; ?></td>
					<td id="p_city"><?php echo $row['p_city']; ?></td>
					<td id="p_state"><?php echo $row['p_state']; ?></td>
					<td id="p_zip"><?php echo $row['p_zip']; ?></td>
					<td id="insurer"><?php echo $row['insurer']; ?></td>
					<td id="view"><a href="view_patient.php?pid=<?php echo $row['pid']; ?>" class="view"><i class="fas fa-eye"></i></a></td>
					<td id="trash"><a href="patient_lookup.php?delete=<?php echo $row['pid']; ?>" class="trash"><i class="fas fa-trash-alt"></i></a></td>
				</tr>
				<?php $count++; endwhile; ?>
			</tbody>
		</table>

		<!-- Pagination - Limits the number of records and adds page numbers-->
		<div class="pagination">
			<li><a href="?pageno=1">First</a></li>
			<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
				<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
			</li>
			<?php
				for($i = 1; $i <= $total_pages; $i++)
				{
                    $active = $i == $pageno ? 'class="active"' : '';
                    echo '<li><a href="?pageno=' . $i . '">' . $i . '</a></li>';
                }
			?>
			<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
				<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
			</li>
			<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
		</div>
	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
