<?php include_once '../header.php'; ?>
<?php include 'includes/database_info.inc.php'; ?>

<?php
	if(isset($_GET['vkey'])) {
        $vkey = $_GET['vkey'];
        $result = $mySQLI->query("SELECT is_active, u_hash FROM user_accounts WHERE is_active = 0 AND u_hash = '$vkey' LIMIT 1");
        if($result->num_rows == 1) {
			$mySQLI->query("UPDATE user_accounts SET is_active = 1 WHERE u_hash = '$vkey'");
			$result = $mySQLI->query("SELECT * from user_accounts WHERE u_hash = '$vkey'");
			$user = mysqli_fetch_assoc($result);
			$_SESSION['userID'] = $user['u_id'];
            $_SESSION['pharm_id'] = $user['pharm_id'];
			$_SESSION['recepient'] = $user['u_email'];
			require_once('includes/sendcredentials.inc.php');
        }
        else
        {
            $verified = true;
        }
    }
?>

<link rel="stylesheet" href="../stylesheets/index.css">
<title>Equinox Pharma Systems</title>
<div class="container">
    <?php if(!$verified): ?>
        <div class="row">
            <div class="col-lg-12">
                <div id="content">
                    <h1>Email Verified!</h1>
                    <h3>Please check your email for login credentials.</h3>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-lg-12">
                <div id="content">
                    <h1>This email is already verified</h1>
                    <h3><a href="login.php">CLICK HERE TO LOGIN</a></h3>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
