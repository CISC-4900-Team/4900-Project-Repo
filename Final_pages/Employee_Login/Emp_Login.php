<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Emp_login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">

    <!-- BootStrap -->
    <script src="https://kit.fontawesome.com/922c329282.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Employee Login Page</title>
</head>
<body>
<!-- navBar -->
<!-- The navigation menu -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2a2a2a;">
    <a href="#" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Help</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Employee Login</button>
    </form>
  </div>
</nav>
<!-- nav Bar End -->
<!-- center page -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="content">
                <h1>Employee Login Page</h1>
                <div class="container" id="forms">
                    <form action="">
                        <!-- Email -->
                        <div>
                            <label for="Employee_ID">Employee ID:</label>
                            <input type="text" name="Employee ID" id="Employee_ID" required>
                        </div>
                        <div>
                             <label for="password">Password:</label>
                             <input type="password" name="password" id="password" placeholder="**********" required> 
                        </div>
                        <div>
                             <label for="Company">Company ID:</label>
                             <input type="password" name="password" id="password" placeholder="**********" required> 
                        </div>
                        <!-- submission -->
                        <button type="button" class="btn btn-light">Login</button>
                        <div>
                            <h5>Forget Password?</h5>
                            <label for="Yes">Yes</label>
                            <input type="radio" name="Admin" id="Yes">
                            <label for="No">No</label>
                            <input type="radio" name="Admin" id="No">
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>