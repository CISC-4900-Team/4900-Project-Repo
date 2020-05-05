<?php include_once '../header.php'; ?>

<?php
    if(isset($_POST['reset_pass_btn'])) {
        if($_POST['emp_pass'] == $_POST['confirm_pass']) {
            include_once 'includes/password_reset.inc.php';
        } else {
            header('location: reset_form.php?pass_mismatch&vkey='.$_GET['vkey']);
            exit();
        }
    }
?>
<link rel="stylesheet" href="css/reset_form.css">
<title>Password Reset</title>

<?php if(isset($_GET['vkey'])): ?>
    <?php
        $vkey = $_GET['vkey'];
        $result = $mySQLI->query("SELECT * FROM users WHERE user_hash = '$vkey'");
        if($result->num_rows > 0): ?>
            <div class="container header">
                <h1><strong>Reset Your Password</strong></h1>
            </div>
            <div class="container reset">
                <form name="reset_form" action="" method="post" autocomplete="off">
                    <div class="form-group col-sm-12">
                        <label for="emp_pass"><strong>New Password:</strong></label><br>
                        <input type="password" name="emp_pass" class="form-control" placeholder="Enter a new password" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="confirm_pass"><strong>Confirm New Password:</strong></label><br>
                        <input type="password" name="confirm_pass" class="form-control" placeholder="Enter new password again" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit" name="reset_pass_btn" class="btn btn-light">Reset Password</button>
                    </div>
                </form>
            </div>
            <?php if(isset($_GET['pass_mismatch'])): ?>
                <div class="container alert">
                    <div class="alert alert-danger" role="alert">
                        Passwords entered do not match. Please make sure both passwords match.
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
<?php else: ?>
    <div class="container">
        <h1><strong>You have tried to access this page without requesting a password reset.</strong></h1>
    </div>
<?php endif; ?>
