<?php include_once 'header.php'; ?>
<?php include 'includes/database_info.inc.php'; ?>

<?php
	if(isset($_GET['vkey'])) {
        $vkey = $_GET['vkey'];
        $result = $mySQLI->query("SELECT is_active, u_hash FROM user_accounts WHERE is_active = 0 AND u_hash = '$vkey' LIMIT 1");
        if($result->num_rows == 1) {
			$mySQLI->query("UPDATE user_accounts SET is_active = 1 WHERE u_hash = '$vkey'");
			require_once('includes/sendcredentials.inc.php');
        } else {
        	echo 'Account Already Verified or Invalid Account';
        }
    }
?>

<link rel="stylesheet" href="stylesheets/index_style.css">
<title>Equinox Pharma Systems</title>
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

<?php include_once 'footer.php'; ?>