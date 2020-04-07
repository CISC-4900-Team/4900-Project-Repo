<?php include_once 'header.php'; ?>

<?php
    include('includes/database_info.inc.php');
    //check if add button has been pressed

    if(isset($_POST['add'])) {
        if(empty($_POST['barcode'])) {
            echo 'Please scan or enter product code';
        } else {
            $result = mysqli_query($mySQLI, "SELECT * FROM medication WHERE barcode = " . $_POST['barcode']);
            if (!$product = mysqli_fetch_assoc($result)) {
                header('location: ?notfound='.$_POST['barcode']);
            } else {
                //If shopping cart array doesn't exist, create session array with first product
                if (!isset($_SESSION['shopping_cart'])) {
                    $_SESSION['shopping_cart'][0] = array
                    (
                        'ITEM_NUM' => '1',
                        'PRODUCT_ID' => $product['med_id'],
                        'DESCRIPTION' => $product['description'],
                        'QUANTITY' => $_POST['quantity'],
                        'PRICE' => $product['mrsp']
                    );
                } else {
                    //Else if cart does exist, just add item
                    $count = count($_SESSION['shopping_cart']);
                    $_SESSION['shopping_cart'][$count] = array
                    (
                        'ITEM_NUM' => $count+1,
                        'PRODUCT_ID' => $product['med_id'],
                        'DESCRIPTION' => $product['description'],
                        'QUANTITY' => $_POST['quantity'],
                        'PRICE' => $product['mrsp']
                    );
                }
            }
        }
        header('location: ?productadded');
    }

    if(isset($_POST['void'])) {
        $prod = $_POST['void'];
        foreach($_SESSION['shopping_cart'] as $key => $product) {
            if($product['ITEM_NUM'] == $prod) {
                unset($_SESSION['shopping_cart'][$key]);
            }
        }
        $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    }
    if(isset($_POST['void_sale_btn'])) {
        foreach($_SESSION['shopping_cart'] as $key => $product) {
            unset($_SESSION['shopping_cart'][$key]);
        }
        header('location: ?sale_canceled');
    }
?>

<link rel="stylesheet" href="stylesheets/cart_style.css">
<title>Cart Test</title>
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
                <button type="submit" name="add" class="btn btn-primary">Add</button>
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
    <div class="cart-footer">
        <div class="row">
            <div class="col-sm-7">
                <h4 style="color: #5cd65c;"><strong>TOTAL:</strong></h4>
            </div>
            <div class="col-sm-5 total">
                <h4 class="total" style="float: right; color: #5cd65c;">
                    <strong>$<?php $grandTotal = $total * 1.08875; echo bcdiv($grandTotal, 1, 2); ?></strong>
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <h4 style="color: #ffb84d;"><strong>CASH:</strong></h4>
            </div>
            <div class="col-sm-5 total">
                <h4 class="total" style="float: right; color: #ffb84d;">
                    <strong>
                        $<?php
                            if(isset($_POST['cash_btn'])) {
                                $cashGiven = $_POST['cash_received'];
                                echo $cashGiven;
                            } else {
                                echo '0.00';
                            }
                        ?>
                    </strong>
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <h4 style="color: #ff4d4d;"><strong>CHANGE:</strong></h4>
            </div>
            <div class="col-sm-5 total">
                <h4 class="total" style="float: right; color: #ff4d4d;">
                    <strong>
                        $<?php
                            if(isset($_POST['cash_btn'])) {
                                $cashGiven = $_POST['cash_received'];
                                $change = bcdiv($cashGiven - $grandTotal, 1, 2);
                                $change += .01;
                                echo $change;
                                foreach($_SESSION['shopping_cart'] as $key => $product) {
                                    unset($_SESSION['shopping_cart'][$key]);
                                }
                            } else {
                                echo '0.00';
                            }
                        ?>
                    </strong>
                </h4>
            </div>
        </div>
        <form name="checkout" action="" method="post">
            <div class="row">
                <div class="form-group col-sm-12">
                    <input type="text" name="cash_received" placeholder="Enter Cash Received" class="form-control" style="width: 100%;">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" name="cash_btn" class="btn btn-success checkout-btn">CASH</button>
                </div>
                <div class="col-sm-4">
                    <button type="submit" name="credit_btn" class="btn btn-primary checkout-btn">CARD</button>
                </div>
                <div class="col-sm-4">
                    <button type="submit" name="void_sale_btn" class="btn btn-danger checkout-btn">VOID SALE</button>
                </div>
            </div>
        </form>
        <div class="row cart-funcs">
            <div class="col-sm-4">
                <button type="submit" name="" class="btn btn-info checkout-btn">SHOW LAST</button>
            </div>
            <div class="col-sm-4">
                <button type="submit" name="" class="btn btn-info checkout-btn">TODO</button>
            </div>
            <div class="col-sm-4">
                <button type="submit" name="" class="btn btn-info checkout-btn">SETTINGS</button>
            </div>
        </div>
    </div>
</div>