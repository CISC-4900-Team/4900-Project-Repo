<!-- Header Include -->
<?php include('includes/header.inc.php'); ?>

<!-- User Login Page Style Sheet -->
<link rel="stylesheet" href="stylesheets/user_login_style.css">

<!-- Title -->
<title>User Login</title>

<!-- center page -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="content">
                <h1>Pharmacist Login</h1>
                <form action="">
                   <!-- Email -->
                   <div>
                       <label for="email">Email:</label>
                       <input type="email" name="email" id="email" placeholder="JohnDoe@gmail.com" required>
                   </div>
                   <div>
                        <label for="password">Pass:</label>
                        <input type="password" name="password" id="password" placeholder="**********">
                   </div>
                   <div>
                        <label for="Company">Company ID:</label>
                        <input type="password" name="password" id="password" placeholder="**********">
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