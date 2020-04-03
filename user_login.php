<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/header.inc.php'; ?>
<link rel="stylesheet" href="stylesheets/login_page_style.css">
<title>Employee Login</title>

<?php
	//Check if form is being submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    	//Check if button was pressed
		if(isset($_POST['login']))
		{
		    require '$_SERVER["DOCUMENT_ROOT"]/includes/login.inc.php';
		}
    }
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div id="content">
				<h1>Employee Login</h1>
				<div class="container" id="forms">
					<form name="user_login" action="user_login.php" method="post" autocomplete="off">
						<div>
							<label for="emp_id">Employee ID:</label>
							<input type="text" name="emp_id" id="user-id" required>
						</div>
						<div>
							<label for="pharm_id">Pharmacy ID:</label>
							<input type="text" name="pharm_id" id="company-id" required>
						</div>
						<div>
							<label for="password">Password:</label>
							<input type="password" name="password" id="password" placeholder="**********" required>
						</div>
						<input type="checkbox" id="save_cred" name="save_cred">
						<label for="save_cred">Save Login</label><br>
						<button type="input" name="login" class="btn btn-light">Login</button><br>
						<a href="#">Forgot ID/Password?</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>