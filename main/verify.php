<?php include_once '../header.php'; ?>
<?php include '../includes/database_info.inc.php'; ?>

<?php
	if(isset($_GET['vkey']))
	{
        $verified = false;
        $vkey = $_GET['vkey'];
        $result = $mySQLI->query("SELECT is_verified, user_hash FROM users WHERE is_verified = 0 AND user_hash = '$vkey' LIMIT 1");
        if($result->num_rows == 1) {
			$mySQLI->query("UPDATE users SET is_verified = 1 WHERE user_hash = '$vkey'");
			$result = $mySQLI->query("SELECT * from users WHERE user_hash = '$vkey'");
			$user = mysqli_fetch_assoc($result);
			$_SESSION['userID'] = $user['user_id'];
            $_SESSION['pharm_id'] = $user['pharm_id'];
			$_SESSION['recepient'] = $user['user_email'];
			$_SESSION['role'] = $user['role'];
			require_once('../includes/sendcredentials.inc.php');
        }
        else
            $verified = true;
    }
?>

<link rel="stylesheet" href="css/verify.css">
<title>Equinox Pharma Systems</title>
<div class="container">
    <?php if(!$verified): ?>
        <div class="row">
            <div class="col-lg-12">
                <div id="content">
	                <h1><strong>Email Verified!</strong></h1>
                    <h3>Please check your email for login credentials. The email will contain your user ID and company ID.</h3>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-lg-12">
                <div id="content">
	                <h1><strong>This email is already verified</strong></h1>
                    <h3><a href="login.php">CLICK HERE TO LOGIN</a></h3>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

