<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Trans.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/922c329282.js" crossorigin="anonymous"></script>
    <title>Transaction page</title>
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
<!-- Transaction Structure -->
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
        <div class="row">

<!-- payment container -->
            <div class="col-50">
                    <h3>Medication Transaction</h3>
                            <input type="text" id="ID" name="ID" placeholder="PatientID" required>
                    <h3>Payment</h3>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                            <button><i class="fas fa-money-bill-alt" style="color:green;"></i></button>
                        </div>
                <input type="text" id="cname" name="cardname" placeholder="Name on card">
                <input type="text" id="adr" name="address" placeholder="Address">
                <input type="text" id="city" name="city" placeholder="City">
                <input type="text" id="ccnum" name="cardnumber" placeholder="Credit card number">
                <input type="text" id="state" name="state" placeholder="State">
        
<!--Seperate Zip/Exp  -->
            <div class="row">
              <div class="col-50">
                <input type="text" id="zip" name="zip" placeholder="Zip Code">
              </div>
              <div class="col-50">
                <input type="text" id="expmonth" name="expmonth" placeholder="expiration month">
              </div>
            </div>

<!-- Seperate Exp/cvv -->
            <div class="row">
              <div class="col-50">
                <input type="text" id="expyear" name="expyear" placeholder="expiration year">
              </div>
              <div class="col-50">
                <input type="text" id="cvv" name="cvv" placeholder="cvv">
              </div>
            </div>
          </div>
<!-- Checkout Button -->
        </div>
        <input type="submit" value="Complete Transaction" class="submit btn">
      </form>
    </div>
  </div>

<!-- Shopping Cart -->
  <div class="col-25">
    <div class="container" >
      <!-- testing -->
      <h4>Cart
        <span class="price" style="color:black"></span>
      </h4>
      <form name="prod_upc" action="" method="post" class="cart-header" style="margin-top: 20px;">
        <div class="form-row">
            <div class="col-sm-2">
                <input type="text" name="quantity" placeholder="QT" value="1" class="form-control barcode-input">
            </div>
            <div class="col-sm-8">
                <input type="text" name="barcode" autofocus="autofocus" placeholder="Scan or Enter UPC" class="form-control barcode-input">
            </div>
            <div class="col-sm-1">
                <button type="submit" name="add" class="btn btn-primary" style="background-color: #505050;">Add</button>
            </div>
        </div>
        <?php if(isset($_GET['notfound'])): ?>
            <div class="form-row">
                <div class="col-sm-12">
                    <p style="text-align: center;">Product Not Found. Make sure UPC is Correct</p>
                </div>
            </div>
        <?php endif; ?>
        <table class="" style="margin-top: 10px;">
            <thead>
            <th class="quantity">QT</th>
            <th class="product">PRODUCT</th>
            <th class="price">PRICE</th>
            <th>VOID</th>
            </thead>
        </table>
    </form>
    <div class="col-sm-12 cart-body">
        <div class="row">
            <table class="prod_table">
                <tbody>
                <?php
                    $total = 0;
                    if(!isset($_SESSION['shopping_cart'])) {
                        $total = 0;
                    }
                    if(isset($_SESSION['shopping_cart'])):
                        foreach($_SESSION['shopping_cart'] as $key => $product): ?>
                            <tr>
                                <td class="quantity"><?php echo $product['QUANTITY']; ?></td>
                                <td class="product"><?php echo $product['DESCRIPTION']; ?></td>
                                <td class="price"><?php echo '$'. number_format($subtotal = $product['PRICE'] * $product['QUANTITY'], 2); ?></td>
                                <td><form action="" method="post"><button type="submit" name="void" value="<?php echo $product['ITEM_NUM']; ?>">X</button></form></td>
                            </tr>
                            <?php $total += $subtotal; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
        </div>
        </div>
      <!-- testing end -->
    </div>
  </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>