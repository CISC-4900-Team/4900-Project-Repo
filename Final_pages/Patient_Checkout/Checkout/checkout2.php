<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="checkout.css">
    <script src="checkout.js"></script>
    <title>Scan Items</title>
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
<!-- MAIN PAGE -->
<div class="container" style="float: left;">
    <form name="prod_upc" action="" method="post" class="cart-header">
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
   
        <form name="checkout" action="" method="post">
            <div class="row">
                <div class="form-group col-sm-12">
                <input type="submit" value="Proceed to Payment" class="btn btn-primary"  style="background-color: #505050;">
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-12">
                </h4>
            </div>
        </div>
    </div>

</body>
