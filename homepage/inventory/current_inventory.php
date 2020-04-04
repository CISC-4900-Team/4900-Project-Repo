<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/header.inc.php'; ?>
<link rel="stylesheet" href="../../stylesheets/inventory_style.css">
<title>Current Inventory</title>

<?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/db_includes/inventorySchema.inc.php';

    //Getting the column names
	$getCol = "SELECT * FROM drug_inventory";
    $dataResult = mysqli_query($invSQLI, $getCol);
?>

<div class="container">
	<h3>Drug Inventory</h3>
	<table id="drugs" class="display" style="width:100%">
		<thead>
			<tr>
				<th></th>
				<th id="ven-field">Vendor ID</th>
				<th id="drug-field">Drug Name</th>
				<th id="gen-field">Generic</th>
				<th id="count">Pill Ct</th>
				<th id="count">Bottle Ct</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
        <?php $count = 1; while($row = mysqli_fetch_array($dataResult)): ?>
		<tr>
			<td><?php echo $row['prod_id']; ?></td>
			<td id="ven-field"><?php echo $row['vendor_id']; ?></td>
			<td id="drug-field"><?php echo $row['drug_name']; ?></td>
			<td id="gen-field"><?php echo $row['generic']; ?></td>
			<td id="count"><?php echo $row['pill_count']; ?></td>
			<td id="count"><?php echo $row['bottle_count']; ?></td>
			<td id="info"><a href="#" id="info"><i class="fas fa-info-circle" id="info"></i></a></button></td>
		</tr>
        <?php $count++; endwhile; ?>
		</tbody>
	</table>
	<button type="submit" id="order-btn">Order</button><br>
	<hr>
	<h3>Product Inventory</h3>
	<table id="products" class="display" style="width:100%">
		<thead>
		<tr>
			<th></th>
			<th>Vendor ID</th>
			<th>Drug Name</th>
			<th>Generic</th>
			<th>Pill Ct</th>
			<th>Bottle Ct</th>
		</tr>
		</thead>
		<tbody>
        <?php $count = 1; while($row = mysqli_fetch_array($dataResult)): ?>
			<tr>
				<td><?php echo $row['prod_id']; ?></td>
				<td><?php echo $row['vendor_id']; ?></td>
				<td><?php echo $row['drug_name']; ?></td>
				<td><?php echo $row['generic']; ?></td>
				<td><?php echo $row['pill_count']; ?></td>
				<td><?php echo $row['bottle_count']; ?></td>
			</tr>
            <?php $count++; endwhile; ?>
		</tbody>
	</table>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>
