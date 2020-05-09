<?php include_once '../../header.php';?>

<?php
	if(isset($_POST['add']))
		require_once 'includes/newuser.inc.php';
?>
<link rel="stylesheet" href="css/new_employee.css">
<title>New Employee</title>
<div class="container my-con">
	<?php if(isset($_GET['add=success']))echo '<h2>New Employee Addedd Successfully</h2>'; ?>
	<h1>New Employee</h1>
    <form action="" method="post" class="main-form">
        <div class="form-row">
            <div class="form-group col-md-4">
                <div><label for="f_name">First Name:</label></div>
                <input type="text" class="form-control" name="emp_first"
                       pattern="[a-zA-Z-]+"
                       title="No symbols, numbers or special characters, except hyphens"
                       placeholder="John" required>
            </div>
	        <div class="form-group col-md-4">
		        <div><label for="l_name">Last Name:</label></div>
                <input type="text" class="form-control"  name="emp_last"
                       title="No symbols, numbers or special characters, except hyphens"
                       placeholder="Doe" required>
            </div>
	        <div class="form-group col-md-4">
		        <div><label for="license">License Number:</label></div>
		        <input type="text" class="form-control" name="emp_license"
		               pattern="[a-zA-Z0-9-]+"
		               title="Only letters, numbers, and hyphens" required>
	        </div>
        </div>
	    <div class="form-row">
		    <div class="form-group col-md-5">
                <div><label for="addr">Address:</label></div>
                <input type="text" class="form-control" name="addr"
                       pattern="[a-zA-Z0-9-\s]+"
                       title="Only letters, numbers, and hyphens" required>
            </div>
		    <div class="form-group col-md-3">
			    <div><label for="city">City:</label></div>
                <input type="text" class="form-control" name="city"
                       pattern="[a-zA-Z\s]+"
                       title="No symbols, numbers or special characters" required>
            </div>
		    <div class="form-group col-md-2">
			    <label for="inputState">State</label>
			    <select id="inputState" class="form-control" name="state" required>
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
                <input type="text" class="form-control" name="zip"
                       pattern="[0-9]{5}"
                       title="5 Digit Zipcode"
                       placeholder="12345" required>
            </div>
        </div>
	    <div class="form-row">
		    <div class="form-group col-md-6">
			    <div><label for="email">Email:</label></div>
			    <input type="email" class="form-control" name="email" placeholder="JohnDoe@gmail.com" required>
		    </div>
		    <div class="form-group col-md-6">
			    <div><label for="phone">Phone 1:</label></div>
			    <input type="text" class="form-control" name="phone"
			           pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
			           title="Phone number must match the following pattern: 000-000-0000"
			           placeholder="000-000-000 Optional">
		    </div>
	    </div>
	    <div class="form-row">
		    <div class="form-group col-md-6">
			    <div><label for="email">Temporary Password:</label></div>
			    <input type="password"
			           class="form-control"
			           name="password"
			           placeholder="********"
			           pattern="[a-zA-Z0-9\W]{6,}+"
			           title="Minimum length of 6. Limited to letters, numbers only, and symbols." required>
			    <h6 id="message1" class="form-text text-muted">Password conditions: Minimum length of 6. Limited to letters, numbers only, and symbols.</h6>

		    </div>
		    <div class="form-group col-md-6">
			    <div><label for="email">Confirm Password:</label></div>
			    <input type="password"
			           class="form-control"
			           placeholder="********"
			           pattern="[a-zA-Z0-9\W]{6,}+"
			           title="Both passwords must match and meet the required conditions" required>
			    <h6 id="message2" class="form-text text-muted">Both passwords must match and meet the required conditions</h6>
		    </div>
	    </div>
        <div class="row my-row">
            <div class="col-md-12">
                <h4>Employee Designation</h4>
	            <input type="radio" name="designation" value="USER" checked>
	            <label for="admin">User</label>
                <input type="radio" name="designation" value="ADMIN">
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

<?php include_once '../../footer.php'; ?>