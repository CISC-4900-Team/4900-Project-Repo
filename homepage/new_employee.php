<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.inc.php' ?>
<link rel="stylesheet" href="../stylesheets/New_Emp.css">
<title>New Employee</title>

<?php
    //Check if form is being submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['add']))
        {
            require '../includes/newuser.inc.php';
        }
    }
?>

<div class="container my-con">
	<?php if(isset($_GET['add=success']))echo '<h2>New Employee Addedd Successfully</h2>'; ?>
	<h1>New Employee</h1>
    <form action="" method="post" class="main-form">
        <div class="form-row">
            <div class="form-group col-md-3">
                <div><label for="f_name">First Name:</label></div>
                <input type="text" class="form-control" name="f_name" id="f_name" placeholder="John" required>
            </div>
	        <div class="form-group col-md-3">
		        <div><label for="l_name">Last Name:</label></div>
                <input type="text" class="form-control"  name="l_name" id="l_name" placeholder="Doe" required>
            </div>
	        <div class="form-group col-md-3">
		        <div><label for="social">Social Security:</label></div>
                <input type="text" class="form-control" name="social" id="social" placeholder="000-00-0000" required>
            </div>
	        <div class="form-group col-md-3">
		        <div><label for="license">License Number:</label></div>
		        <input type="text" class="form-control" name="license" id="license" placeholder="123456" required>
	        </div>
        </div>
	    <div class="form-row">
		    <div class="form-group col-md-5">
                <div><label for="addr">Address:</label></div>
                <input type="text" class="form-control" name="addr" id="addr" required>
            </div>
		    <div class="form-group col-md-3">
			    <div><label for="city">City:</label></div>
                <input type="text" class="form-control" name="city" id="city" required>
            </div>
		    <div class="form-group col-md-2">
			    <label for="inputState">State</label>
			    <select id="inputState" class="form-control" name="state">
				    <?php
                        $states = array("AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC", "DE", "FL", "GA", "HI", "IA",
	                        "ID", "IL", "IN", "KS", "KY", "LA", "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC",
	                        "ND", "NE", "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN",
	                        "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY");
					    for($i=0;$i<50;$i++):?>
				    		<option value="<?php echo "$states[$i]"?>"><?php echo "$states[$i]"?></option>
				    <?php endfor; ?>
			    </select>
            </div>
		    <div class="form-group col-md-2">
			    <div><label for="zipcode">Zip:</label></div>
                <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="12345" required>
            </div>
        </div>
	    <div class="form-row">
		    <div class="form-group col-md-6">
			    <div><label for="email">Email:</label></div>
                <input type="email" class="form-control" name="email" id="email" placeholder="JohnDoe@gmail.com" required>
            </div>
		    <div class="form-group col-md-3">
			    <div><label for="phone">Phone 1:</label></div>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="(xxx)-xxx-xxxx" required>
            </div>
		    <div class="form-group col-md-3">
			    <div><label for="phone">Phone 2:</label></div>
			    <input type="text" class="form-control" name="phone" id="phone" placeholder="Optional">
		    </div>
        </div>
        <div class="row my-row">
            <div class="col-md-12">
                <h4>Employee Designation</h4>
	            <input type="radio" name="designation" id="employee" value="User" checked>
	            <label for="admin">User</label>
                <input type="radio" name="designation" id="admin" value="Admin">
                <label for="admin">Admin</label>
            </div>
        </div>
        <div class="row my-row">
            <div class="col-md-12">
	            <button type="submit" name="add" class="btn btn-primary">Add Employee</button>
            </div>
        </div>
    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.inc.php'; ?>