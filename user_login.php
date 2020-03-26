<?php
	//Check if form is being submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    	//Check if button was pressed
		if(isset($_POST['login']))
		{
		    require 'includes/login.inc.php';
		}
    }
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php' ?>
<link rel="stylesheet" href="stylesheets/login_page_style.css">
<title>Employee Login</title>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div id="content">
				<h1>Employee Login</h1>
				<div class="container" id="forms">
					<form name="user_login" action="user_login.php" method="post" autocomplete="off">
						<div>
							<label for="Employee_ID">Employee ID:</label>
							<input type="text" name="user_id" id="user-id" required>
						</div>
						<div>
							<label for="Company">Company ID:</label>
							<input type="text" name="company_id" id="company-id" required>
						</div>
						<div>
							<label for="password">Password:</label>
							<input type="password" name="password" id="password" placeholder="**********" required>
						</div>
						<input type="checkbox" id="save_cred" name="save_cred">
						<label for="save_cred">Save Login</label><br>
						<button name="login" class="btn btn-light">Login</button><br>
						<a href="#">Forgot ID/Password</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>