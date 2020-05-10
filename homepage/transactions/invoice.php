<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/922c329282.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/invoice_style.css">
<title>Invoice <?php echo '123456'; ?></title>
<div class="container">
    <h2>Equinox Patient Transaction Invoice</h2>
    <h3>Invoice # 12345</h3>
    <h3>09/02/2020</h3>
    <hr>
    <div class="form-row">
        <div class="form-group">
            <strong>Patient Info: </strong>
            <br>
            John Doe
            <br>
            123 Main Street
            <br>
            Brooklyn, NY, 11214
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <strong>Insurance Information: </strong>
            <br>
            Provider:
            <br>
            Policy #:
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <strong>Payment Information: </strong>
            <br>
            Dated: April 4, 2020
            <br>
            Visa ending 6666
            <br>
            johndoe@gmail.com
        </div>
    </div>
    <h3><strong>Purchase Summary</strong></h3>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="width: 600px;">Item</th>
                        <th style="width: 100px;">Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 600px;">Item1</td>
                        <td style="width: 100px;">$10.99</td>
                        <td>1</td>
                        <td>$10.99</td>
                    </tr>
                    <tr>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"><strong>Subtotal:</strong></td>
                        <td class="thick-line">$670.99</td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"><strong>Total:</strong></td>
                        <td class="no-line">$20.99</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>