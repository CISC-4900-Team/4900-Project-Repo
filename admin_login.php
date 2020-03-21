<!-- Nav Include -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php' ?>

<!-- Admin Login Page Style Sheet -->
<link rel="stylesheet" href="stylesheets/admin_login_style.css">

<!-- Title -->
<title>Administrator Login</title>

<!-- center page -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="content">
                <h1>Admin Login</h1>
                <form action="">
					<div>
					    <label for="company_id">Company ID:</label>
					    <input type="text" name="company_id" id="company_id" required>
					</div>
					<div>
					   <label for="admin_id">Admin ID:</label>
					   <input type="text" name="admin_id" id="admin_id" required>
					</div>
					<div>
					    <label for="password">Password:</label>
					    <input type="password" name="password" id="password" placeholder="**********" required>
					</div>
                   <!-- submission -->
                   <input type="submit" value="Login">
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