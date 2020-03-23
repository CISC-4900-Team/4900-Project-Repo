<?php
	//Check if form is being submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    	//Checking which button was pressed
		if(isset($_POST['user_login']))
		{
		    require 'includes/user_authentication.php';
		}
    }
?>
<!-- Header Include -->
<?php  include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php' ?>

<!-- User Login Page Style Sheet -->
<link rel="stylesheet" href="stylesheets/user_login_style.css">

<!-- Title -->
<title>User Login</title>

<!-- center page -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="content">
                <h1>Login to Equinox</h1>
                <form name="user_login" action="user_login.php" method="post" autocomplete="off">
	                <div>
		                <label for="company_id">Company ID:</label><br>
		                <input type="text" name="company_id" id="company_id" placeholder="Company ID*" required>
	                </div>
                    <div>
	                    <label for="user_id">User ID:</label><br>
                        <input type="text" name="user_id" id="user_id" placeholder="Employee ID*" required>
                    </div>
                    <div>
	                    <label for="password">Password:</label><br>
                        <input type="password" name="password" id="password" placeholder="Password*" required>
                    </div>
	                <input type="checkbox" id="save_cred" name="save_cred">
	                <label for="save_cred">Save Credentials</label><br>
	                <!-- TO DO: Forgot password/ID-->
                   <!-- submission -->
	                <button name="user_login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>