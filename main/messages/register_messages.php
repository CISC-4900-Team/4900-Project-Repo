<?php if(isset($_GET['error'])): ?>
    <?php if($_GET['error'] == 'pharm_license_exists'): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Pharmacy license already exists in the system. Make sure the license you entered is correct
                    or contact Equinox support team for assistance.</strong>
        </div>
    <?php endif; ?>
    <?php if($_GET['error'] == 'pharm_email_exists'): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Pharmacy e-mail already exists in the system. Make sure the pharmacy email you entered is correct
                    or contact Equinox support team for assistance.</strong>
        </div>
    <?php endif; ?>
    <?php if($_GET['error'] == 'manager_license_exists'): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>The manager license already exists in the system. Make sure the license number you entered is correct
                    or contact Equinox support team for assistance.</strong>
        </div>
    <?php endif; ?>
    <?php if($_GET['error'] == 'manager_email_exists'): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>The manager e-mail already exists in the system. Make sure the e-mail you entered is correct
                    or contact Equinox support team for assistance.</strong>
        </div>
    <?php endif; ?>
<?php endif; ?>