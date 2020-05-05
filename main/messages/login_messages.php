<?php if(isset($_GET['error'])): ?>
    <div class="container alert">
        <?php if($_GET['error'] == 'account_unverified'): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Your account is not yet verified. Please check your email for the verification link</strong>
            </div>
        <?php endif; ?>
        <?php if($_GET['error'] == 'not_found'): ?>
            <div class="container alert">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Account not found. Make sure the employee ID is correct</strong>
                </div>
            </div>
        <?php endif; ?>
        <?php if($_GET['error'] == 'wrongpassword'): ?>
            <div class="container alert">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Password entered was incorrect</strong>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
