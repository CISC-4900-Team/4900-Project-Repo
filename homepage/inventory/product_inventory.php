<?php include_once '../../header.php'; ?>
<?php include '../../includes/database_info.inc.php'; ?>

<?php
    $sql = "SELECT * FROM drug_inventroy";
    $result = mysqli_query($mySQLI, $sql);
?>

<link rel="stylesheet" href="Inv.css">
<div class="container">
    <h1>Product Inventory</h1>
</div>
<div class="container mb-3 mt-3">
    <table class="table table-striped table-bordered table-hover" id="product_inventory" style="width: 100%">
        <thead>
        <tr>
	        <th>#</th>
            <th>Barcode</th>
            <th>Drug Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Sale Price</th>
            <th>Order Num</th>
            <th>Update Inventory</th>
            <th>Place Order</th>
        </tr>
        </thead>
        <tbody>
        <?php while($drug_record = mysqli_fetch_array($result)): ?>
            <tr>
	            <td><?php echo $drug_record['drug_id']; ?></td>
                <td><?php echo $drug_record['barcode']; ?></td>
                <td><?php echo $drug_record['drug_name']; ?></td>
                <td><?php echo $drug_record['description']; ?></td>
                <td><?php echo $drug_record['quantity']; ?></td>
                <td>$<?php echo $drug_record['unit_price']; ?></td>
                <td>$<?php echo $drug_record['sale_price']; ?></td>
                <td>Order Invoice Num</td>
                <td><i class="fas fa-boxes"></i></td>
                <td><i class="fas fa-cart-arrow-down"></i></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include_once '../../footer.php'; ?>