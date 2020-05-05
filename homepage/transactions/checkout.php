<?php include_once '../../header.php';  ?>

<link rel="stylesheet" href="css/checkout.css">
<title>Transaction page</title>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="container" id="myContainer">
                <h3>Cart</h3>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="container" id="myContainer">
	            <h3>Medication Transaction</h3>
	            <form>
		            <div class="row">
			            <div class="col-sm-4">
				            <input type="text" name="patientID" class="form-control" placeholder="Patient ID">
			            </div>
		            </div>
		            <h5 style="margin-bottom: 0px;">Payment Type</h5>
		            <div class="icon-container">
			            <button type="button" class="btn paymentButton" id="cashButton" style="font-size: 36px; padding: 0px 6px 0px 6px; color:#00b300;"><i class="fas fa-money-bill-alt"></i></button>
			            <button type="button" class="btn paymentButton" id="creditButton" style="font-size: 30px; padding: 2px 6px 2px 6px; color:#1a1aff;"><i class="fas fa-credit-card"></i></button>
		            </div>
		            <div id="cashField">
			            <div class="form-row" id="paymentInfoFields">
				            <div class="col-sm-6">
					            <label>Cash Received</label>
					            <input type="text" name="cardNumber" class="form-control">
				            </div>
			            </div>
		            </div>
		            <div id="creditCardField" style="display: none">
			            <h5>Credit/Debit Card Information</h5>
			            <div class="form-row" id="paymentInfoFields">
				            <div class="col">
					            <label>Card Number</label>
					            <input type="text" name="cardNumber" class="form-control">
				            </div>
				            <div class="col-sm-2">
					            <label>CVV</label>
					            <input type="text" name="cvv" class="form-control">
				            </div>
				            <div class="col-sm-2">
					            <label>Exp Month</label>
					            <input type="text" name="expMonth" class="form-control">
				            </div>
				            <div class="col-sm-2">
					            <label>Exp Year</label>
					            <input type="text" name="expYear" class="form-control">
				            </div>
			            </div>
			            <h5>Cardholder Information</h5>
			            <div class="form-row" id="paymentInfoFields">
				            <div class="col-sm-6">
					            <label>Name On Card</label>
					            <input type="text" name="cardholderName" class="form-control">
				            </div>
			            </div>
			            <div class="form-row" id="paymentInfoFields">
				            <div class="col-sm-5">
					            <label>Address</label>
					            <input type="text" name="cardholderName" class="form-control">
				            </div>
				            <div class="col-sm-3">
					            <label>City</label>
					            <input type="text" name="cardholderName" class="form-control">
				            </div>
				            <div class="col-sm-2">
					            <label>State</label>
					            <input type="text" name="cardholderName" class="form-control">
				            </div>
				            <div class="col-sm-2">
					            <label>Zipcode</label>
					            <input type="text" name="cardholderName" class="form-control">
				            </div>
			            </div>
		            </div>
		            <button type="submit" class="submit btn">Complete Transaction</button>
	            </form>
            </div>
        </div>
    </div>
</div>
<script src="transactionScript.js"></script>