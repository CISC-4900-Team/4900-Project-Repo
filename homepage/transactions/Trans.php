<?php include_once '../../header.php'; ?>

<link rel="stylesheet" href="../../stylesheets/trans.css">
<title>Transaction</title>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="">
        <div class="row">

<!-- payment container -->
            <div class="col-50">
                    <h3>Medication Transaction</h3>
                        <label for="ID"><i class="fa fa-user"></i> PatientID</label>
                        <input type="text" id="ID" name="ID" placeholder="ID" required>
                    <h3>Payment</h3>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                            <button><i class="fas fa-money-bill-alt" style="color:green;"></i></button>
                        </div>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe">

                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">

                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York">

                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">

                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
        
<!--Seperate Zip/Exp  -->
            <div class="row">
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
              <div class="col-50">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">
              </div>
            </div>

<!-- Seperate Exp/cvv -->
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
<!-- Checkout Button -->
        </div>
        <input type="submit" value="Continue to checkout" class="btn btn-primary checkout">
      </form>
    </div>
  </div>
<!-- Shopping Cart -->
  <div class="col-25">
    <div class="container" >
      <h4>Cart
        <span class="price" style="color:black">
        <i class="fa fa-shopping-cart"></i>
        </span>
      </h4>
      <p><a href="#">Item 1</a> <span class="price">$15</span></p>
      <p><a href="#">Item  2</a> <span class="price">$5</span></p>
      <p><a href="#">Item  3</a> <span class="price">$8</span></p>
      <p><a href="#">Item  4</a> <span class="price">$2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
    </div>
  </div>
</div>
