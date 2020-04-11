<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view_patient.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">

    <!-- BootStrap -->
    <script src="https://kit.fontawesome.com/922c329282.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <title>Patient Information</title>
    
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
                  System Usage
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Important Information</a>
              </li>
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
<!-- Main Body -->
    <div class="container">
        <h1>Patient Information</h1>
    </div>

<div class="container mb-3 mt-3">
        <!-- Basic Patient info -->
            <table class="table table-striped table-bordered table-hover" id="mydata" style="width: 100%">
                <thead>
                    <th>Patient ID</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Phone Number</th>
                    <th>sex</th>
                    <th>Allergies</th>  
                </thead>
                <tbody>
                    <tr>
                        <td>23022607</td>
                        <td>Andy Henry</td>
                        <td>12705 115th Aveune, South OZone Park,NY,11420</td>
                        <td>12-23-1993</td>
                        <td>(929)326-5293</td>
                        <td>Male</td>
                        <td>Aspirin</td>
                    </tr>
                </tbody>
            </table>
        <!-- Insurance info-->
        <table class="table table-striped table-bordered table-hover" id="mydata" style="width: 100%">
                <thead>
                    <th>Insurer Name</th>
                    <th>Policy Number</th>
                    <th>Deductible</th>
                </thead>
                <tbody>
                <tr>
                        <td>BlueCross BlueShield</td>
                        <td>06565307</td>
                        <td>$70.00</td>
                    </tr>
                </tbody>
            </table>
        <!-- Primary Care info-->
        <table class="table table-striped table-bordered table-hover" id="mydata" style="width: 100%">
                <thead>
                    <th>Physician Name</th>
                    <th>Office Address</th>
                    <th>Office Phone Number</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. Betsy Varghese</td>
                        <td>105-34 Rockaway Blvd, Ozone Park, NY 11417</td>
                        <td>(718) 945-7150 ext.7101</td>
                    </tr>
                </tbody>
            </table>

        <!-- Prescription info -->
        <table class="table table-striped table-bordered table-hover" id="mydata" style="width: 100%">
                <thead>
                    <th>Medication Name</th>
                    <th>Date_Issued</th>
                    <th>Expiration</th>
                    <th>Num_pills</th>
                    <th>Refill_Count</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Amoxicillin</td>
                        <td>01/20/2020</td>
                        <td>08/13/2020</td>
                        <td>60</td>
                        <td>2</td>
                    </tr>
                </tbody>
            </table>
</div>

<!-- Main Body End -->
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


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Datatables JS -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>