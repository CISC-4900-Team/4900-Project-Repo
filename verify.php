<?php include 'C:\Users\Home\Documents\PharmaSystem\includes\header.inc.php'; ?>
<?php include('includes/db_includes/database_info.inc.php'); ?>
<link rel="stylesheet" href="stylesheets/index_style.css">
<title>Equinox Pharma Systems</title>

<?php
	if(isset($_GET['vkey'])) {
        $vkey = $_GET['vkey'];
        $result = $mySQLI->query("SELECT is_active, u_hash FROM user_accounts WHERE is_active = 0 AND u_hash = '$vkey' LIMIT 1");
        if($result->num_rows == 1) {
			$mySQLI->query("UPDATE user_accounts SET is_active = 1 WHERE u_hash = '$vkey'");
        } else {
        	echo 'Account Already Verified or Invalid Account';
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="content">
                <h1>Email Verified!</h1>
	            <h3>Please check your email for login credentials.</h3>
            </div>
        </div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>