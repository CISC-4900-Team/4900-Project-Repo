<?php
    require_once INCLUDES.'database_info.inc.php';
    $pharmacyID = $_SESSION['companyID'];

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $dataResult = null;
    $limit = 10;
    $offset = ($pageno - 1) * $limit;

    $pgCountSQL = "SELECT COUNT(*) FROM patients";
    $result = mysqli_query($mySQLI, $pgCountSQL);
    $totalRows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($totalRows / $limit);

    //Check if search button is pressed
    if(isset($_GET['search'])) {
        //Get the search query from the search form
        $query = $_GET['query'];

        $sql = "SELECT * FROM patients WHERE ? IN (p_first, p_last, p_sex, p_addr, p_dob, p_zip, p_city, p_state, insurer) AND pharm_id = '$pharmacyID'";
        $stmt = mysqli_stmt_init($mySQLI);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'SQL Statement Failed';
        } else {
            mysqli_stmt_bind_param($stmt, 's', $query);
            mysqli_stmt_execute($stmt);
            $dataResult = mysqli_stmt_get_result($stmt);
        }
    } else {
        //$pagiSQL = "SELECT * FROM patient_info WHERE '$pharmacyID' IN (pharm_id) LIMIT $offset, $limit";
        $pagiSQL = "SELECT * FROM patients LIMIT $offset, $limit";
        $dataResult = mysqli_query($mySQLI, $pagiSQL);
    }
?>