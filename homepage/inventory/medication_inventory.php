<?php include_once '../../header.php'; ?>
<?php include '../../includes/database_info.inc.php'; ?>

<?php
    $sql = "SELECT * FROM medication_inventory WHERE pharm_id = ".$_SESSION['companyID'];
    $result = mysqli_query($mySQLI, $sql);

    if(isset($_POST['add_btn'])) {
		include_once 'includes/add_medication.inc.php';
    }
?>
<link rel="stylesheet" href="css/inventory_style.css">
<div class="container mb-3 mt-3">
    <h1>Medication Inventory</h1>
    <hr>
    <form action="" method="post">
        <div class="inv-add-form" style="width: 800px; margin: auto;">
            <div class="form-row">
                <div class="form-group col">
                    <input type="text"
                           class="text-field form-control"
                           name="med_name"
                           pattern="[a-zA-Z]+"
                           title="Letters only"
                           placeholder="Medication Name"
                           required>
                </div>
                <div class="form-group col">
                    <input type="text"
                           class="text-field form-control"
                           name="order_number"
                           placeholder="Order Number">
                </div>
            </div>
	        <div class="row">
		        <div class="form-group col-sm-4">
			        <input type="text"
			               class="text-field form-control"
			               name="mfg_name"
			               pattern="[a-zA-Z\s-]+"
			               title="Letters, spaces, and hyphens only"
			               placeholder="Manufacturer Name">
		        </div>
		        <div class="form-group col-sm-5">
			        <input type="text"
			               class="text-field form-control"
			               name="mfg_addr"
			               pattern="[a-zA-Z0-9\s-.,]+"
			               title="Letters, numbers, spaces, dots, and dashes"
			               placeholder="Manufacturer Address">
		        </div>
		        <div class="form-group col-sm-3">
			        <input type="tel"
			               class="text-field form-control"
			               name="mfg_phone"
			               pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
			               title="Match pattern 000-000-0000"
			               placeholder="Manufacturer Phone">
		        </div>
	        </div>
            <div class="form-row">
                <div class="form-group col-sm-5">
                    <input type="text"
                           class="text-field form-control"
                           name="description"
                           placeholder="Description" required>
                </div>
	            <div class="form-group col-sm-5">
		            <input type="text"
		                   class="text-field form-control"
		                   name="side_effects"
		                   placeholder="Side Effects" required>
	            </div>
                <div class="form-group col-sm-2">
                    <input type="text"
                           class="text-field form-control"
                           name="potency"
                           pattern="[0-9a-zA-Z-]+"
                           placeholder="Potency" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <input type="text"
                           class="text-field form-control"
                           name="quantity"
                           pattern="[0-9]+"
                           title="Numbers only"
                           placeholder="Quantity" required>
                </div>
                <div class="form-group col-sm-4">
                    <input type="text"
                           class="text-field form-control"
                           name="unit_price"
                           pattern="[$0-9.]+"
                           title="Numbers, $, and periods only"
                           placeholder="Unit Price" required>
                </div>
                <div class="form-group col-sm-4">
                    <input type="text"
                           class="text-field form-control"
                           name="msrp"
                           pattern="[$0-9.]+"
                           title="Numbers, $, and periods only"
                           placeholder="Sale Price/MSRP" required>
                </div>
            </div>
	        <div class="form-row">
		        <div class="col-sm-12">
			        <input type="text"
			               class="text-field form-control"
			               name="barcode"
			               pattern="[0-9a-zA-Z.-]+"
			               placeholder="Scan UPC/Barcode" required>
		        </div>
	        </div>
            <div class="row justify-content-md-center">
                <button type="submit" name="add_btn" class="btn btn-primary add-btn">Add Medication</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="product_inventory" style="width: 100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Barcode</th>
            <th>Drug Name</th>
            <th>Description</th>
	        <th>Potency</th>
            <th>Sale Price</th>
        </tr>
        </thead>
        <tbody>
        <?php while($drug_record = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?php echo $drug_record['med_id']; ?></td>
                <td><?php echo $drug_record['upc']; ?></td>
                <td><?php echo $drug_record['med_name']; ?></td>
                <td><?php echo $drug_record['description']; ?></td>
	            <td><?php echo $drug_record['potency']; ?></td>
                <td>$<?php echo $drug_record['msrp']; ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#products').DataTable();
    });

    $('#product_inventory').dataTable({
        pagingtype: 'full_numbers'
    });
</script>
<?php include_once '../../footer.php'; ?>