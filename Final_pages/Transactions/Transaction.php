<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Transaction.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/922c329282.js" crossorigin="anonymous"></script>
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <title>Transactions</title>
    
</head>
<body>
<!-- The navigation menu -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2a2a2a;">
        <a href="#" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
                  <!-- DropDown4 Start -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Transactions
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Previous Transactions</a>
              </li>
              <!-- Dropdow4 End -->
               <!-- DropDown5 Start -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Inventory
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Quarter inventory</a>
              </li>
              <!-- Dropdow5 End -->
               <!-- DropDown6 Start -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Patient Checkout
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Process Transaction</a>
              </li>
              <!-- Dropdow6 End -->
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Patient Lookup" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">New Patient</button>
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">New Employee</button>
          </form>
        </div>
      </nav>
<!-- nav Bar End -->

<!-- Main Page -->

<div class="container">
            <h1> Recent Transactions</h1>
    </div>
        <div class="container mb-3 mt-3">
            <table class="table table-striped table-bordered table-hover mydatatable" style="width: 100%">
                <thead>
                    <tr>
                        <th>Transaction Number</th>
                        <th>Items</th>
                        <th>Date of Transaction</th>
                        <th>Payment Used</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>23022607</td>
                            <td>Acetaminophen<br>citalopram<br>Ativan</td>
                            <td>12-23-2019</td>
                            <td>**********2014</td>
                        </tr>
                        <tr>
                            <td>23022607</td>
                            <td>Acetaminophen<br>citalopram<br>Ativan</td>
                            <td>12-23-2019</td>
                            <td>**********2014</td>
                        </tr>
                </tbody>
                <tfoot>
                <tr>
                        <th>Transaction Number</th>
                        <th>Items</th>
                        <th>Date of Transaction</th>
                        <th>Payment Used</th>
                    </tr>
                </tfoot>
            </table>
        </div>



<!-- Main Page End -->
<!-- Footer -->
<footer class="page-footer font-small blue-grey lighten-5">

    <div style="background-color: #2a2a2a;">
      <div class="container">
  
        <div class="row py-4 d-flex align-items-center">
  
        </div>
  
      </div>
    </div>
  
    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">
  
      <!-- Grid row -->
      <div class="row mt-3 dark-grey-text">
  
        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4" >
  
          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Useful links</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a class="dark-grey-text" href="#!">Contact Tech Support</a>
          </p>
          <p>
            <a class="dark-grey-text" href="#!">Help</a>
          </p>
  
        </div>
        <!-- Grid column -->
  
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
  
          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope mr-3"></i> WalgreensLoc225@mail.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i> Store Number: (212)594-2101</p>
  
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
  </footer>
  <!-- Footer -->


<!-- Bootstrap 4  -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Datatable -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.15/api/row().show().js"></script>

<script>
$(document).ready(function() {
    $('.mydatatable').dataTable();
});
</script>
</body>
</html>