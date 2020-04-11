<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- StyleSheet -->
    <link rel="stylesheet" href="Inv.css">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/922c329282.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <title>Inventory</title>
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
            <h1>Current Inventory</h1>
    </div>
        <div class="container mb-3 mt-3">
            <table class="table table-striped table-bordered table-hover" id="mydata" style="width: 100%">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Current Total</th>
                        <th>Previous order date</th>
                        <th>Order Invoice Number</th>
                        <th>Update Inventory</th>
                        <th>Place Order</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>Lexapro</td>
                            <td>100 count</td>
                            <td>05-22-2019</td>
                            <td>91491586</td>
                            <td><i class="fas fa-boxes"></i></td>
                            <td><i class="fas fa-cart-arrow-down"></i></td>
                        </tr>
                        <tr>
                            <td>Oxycodone</td>
                            <td>500 count</td>
                            <td>12-20-2019</td>
                            <td>55975502</td>
                            <td><i class="fas fa-boxes"></i></td>
                            <td><i class="fas fa-cart-arrow-down"></i></td>
                        </tr>
                        <tr>
                            <td>Doxycycline</td>
                            <td>1000 count</td>
                            <td>08-01-2019</td>
                            <td>66775611</td>
                            <td><i class="fas fa-boxes"></i></td>
                            <td><i class="fas fa-cart-arrow-down"></i></td>
                        </tr>
                        <tr>
                            <td>Ibuprofen</td>
                            <td>750 count</td>
                            <td>05-17-2019</td>
                            <td>65740098</td>
                            <td><i class="fas fa-boxes"></i></td>
                            <td><i class="fas fa-cart-arrow-down"></i></td>
                        </tr>
                        <tr>
                            <td>Xanax</td>
                            <td>525 count</td>
                            <td>09-01-2019</td>
                            <td>08340858</td>
                            <td><i class="fas fa-boxes"></i></td>
                            <td><i class="fas fa-cart-arrow-down"></i></td>
                        </tr>
                        <tr>
                            <td>Zoloft</td>
                            <td>1200 count</td>
                            <td>09-01-2019</td>
                            <td>00757700</td>
                            <td><i class="fas fa-boxes"></i></td>
                            <td><i class="fas fa-cart-arrow-down"></i></td>
                        </tr>
                        <tr>
                            <td>Viagra</td>
                            <td>625 count</td>
                            <td>05-17-2019</td>
                            <td>14695104</td>
                            <td><i class="fas fa-boxes"></i></td>
                            <td><i class="fas fa-cart-arrow-down"></i></td>
                        </tr>
                        <tr>
                            <td>Naproxen</td>
                            <td>850 count</td>
                            <td>08-01-2019</td>
                            <td>83448099</td>
                            <td><i class="fas fa-boxes"></i></td>
                            <td><i class="fas fa-cart-arrow-down"></i></td>
                        </tr>
                </tbody>
                <tfoot>
                <tr>
                        <th>Item Name</th>
                        <th>Current Total</th>
                        <th>Previous order date</th>
                        <th>Order Invoice Number</th>
                        <th>Update Inventory</th>
                        <th>Place Order</th>
                    </tr>
                </tfoot>
            </table>
        </div>
<!-- main Page End -->
<!-- Bootstrap JS / JQuery-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Datatables JS -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#mydata').dataTable({
        pagingtype: 'full_numbers'
    })
</script>
</body>
</html>