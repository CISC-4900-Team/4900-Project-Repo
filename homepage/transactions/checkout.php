<?php include_once '../../header.php';  ?>

<link rel="stylesheet" href="css/checkout.css">
<title>Transaction page</title>
<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="container" id="myContainer">
                <h3>Cart</h3>
		            <div class="row">
			            <div class="col-sm-2">
				            <input type="text" class="form-control" name="quantity" id="quantity" value="1" placeholder="QT">
			            </div>
			            <div class="col-sm-7">
				            <input type="text" class="form-control" name="barcode" id="barcode" placeholder="UPC/Barcode">
			            </div>
			            <div class="col">
				            <button type="submit" name="addButton" id="addButton" class="btn btn-dark" onclick="loadProduct()">Add</button>
			            </div>
		            </div>
	            <div>
		            <table class="table" id="cartTable" style="table-layout:fixed;">
			            <thead>
							<tr>
								<th style="width: 75px;">QTY</th>
								<th style="width: 200px;">Description</th>
								<th style="width: 90px;">Price</th>
								<th></th>
							</tr>
			            </thead>
			            <tbody id="cart">
			            </tbody>
		            </table>
		            <hr>
		            <div class="tableFooter">
			            <div class="row">
				            <div class="col-sm-5">
					            <h4 id="totalQuantity"></h4>
				            </div>
				            <div class="col">
					            <div class="row">
						            <div class="col-sm-3">
							            <h4>Total:</h4>
						            </div>
						            <div class="col">
							            <h4 id="totalCost"></h4>
						            </div>
					            </div>
				            </div>
			            </div>
		            </div>
	            </div>
            </div>
        </div>

        <div class="col-sm-6">
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
			            <button type="button" class="btn paymentButton" id="cashButton" style="font-size: 36px; padding: 0px 6px 0px 6px; color: #00b300;"><i class="fas fa-money-bill-alt"></i></button>
			            <button type="button" class="btn paymentButton" id="creditButton" style="font-size: 30px; padding: 2px 6px 2px 6px; color: #0000ff;"><i class="fas fa-credit-card"></i></button>
		            </div>
		            <div id="cashField" style="display: none;">
			            <div class="form-row">
				            <div class="col-sm-6">
					            <label style="font-size: 20px">Cash Received</label>
					            <input type="text" name="cardNumber" class="form-control" style="font-size: 20px">
				            </div>
			            </div>
		            </div>
		            <div id="creditCardField" style="display: block">
			            <h5>Credit/Debit Card Information</h5>
			            <div class="icon-container">
				            <div id="ccIcons"></div>
			            </div>
			            <div class="form-row" id="paymentInfoFields">
				            <div class="form-group col">
					            <input type="text"
					                   name="cardNumber"
					                   class="form-control"
					                   id="cardNumber"
					                   placeholder="Credit Card Number">
				            </div>
				            <div class="form-group col-sm-2">
					            <input type="text"
					                   name="cvv"
					                   class="form-control"
					                   placeholder="CVV">
				            </div>
				            <div class="form-group col-sm-2">
					            <input type="text"
					                   name="expMonth"
					                   class="form-control"
					                   placeholder="Month">
				            </div>
				            <div class="form-group col-sm-2">
					            <input type="text"
					                   name="expYear"
					                   class="form-control"
					                   placeholder="Year">
				            </div>
			            </div>
			            <h5>Cardholder Information</h5>
			            <div class="form-row" id="paymentInfoFields">
				            <div class="col-sm-6">
					            <input type="text"
					                   name="cardholderName"
					                   class="form-control"
					                   placeholder="Name On Card">
				            </div>
			            </div>
			            <div class="form-row" id="paymentInfoFields">
				            <div class="col-sm-5">
					            <input type="text"
					                   name="cardholderName"
					                   class="form-control"
					                   placeholder="Address">
				            </div>
				            <div class="col-sm-3">
					            <input type="text"
					                   name="cardholderName"
					                   class="form-control"
					                   placeholder="City">
				            </div>
				            <div class="col-sm-2">
					            <input type="text"
					                   name="cardholderName"
					                   class="form-control"
					                   placeholder="State">
				            </div>
				            <div class="col-sm-2">
					            <input type="text"
					                   name="cardholderName"
					                   class="form-control"
					                   placeholder="Zip">
				            </div>
			            </div>
		            </div>
		            <button type="submit" class="submit btn">Complete Transaction</button>
	            </form>
            </div>
        </div>
    </div>
</div>
<script src="js/transactionScript.js"></script>
<script src="js/creditCardValidator.js"></script>