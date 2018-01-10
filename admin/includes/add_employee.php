<div class="row">
	<div class="col-md-12">
		<div class="btn-group btn-group-justified">
		  <a href="admin.php?action=employees" class="btn btn-primary">View all employees</a>
		  <a href="admin.php?action=add_employee" class="btn btn-primary active">Add employee</a>
		</div>
	</div>
</div>
<br>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php 

			function test_input($data){
				$data = trim($data);
				$data = stripcslashes($data);
				$data = strip_tags($data);
				$data = htmlspecialchars($data);
			 	return $data;
			}

			if(isset($_POST["add_employee"])){

				$_fullname  = ucwords(test_input($_POST['fullname']));
				$_email  = strtolower(test_input($_POST['email']));
				$_phone  = ucfirst(test_input($_POST['phone']));
				$_gender  = test_input($_POST['gender']);
				$_position  = ucwords(test_input($_POST['position']));
				$_bank_name  = test_input($_POST['bank_name']);
				$_account_name  = Ucwords(test_input($_POST['account_name']));
				$_account_number  = test_input($_POST['account_number']);
				$_address  = test_input($_POST['address']);

				$sql = "INSERT INTO `employee`(`fullname`, `email`, `phone`,  `gender`, `position`, `bank_name`, `account_name`, `account_number`, `address`) VALUES('$_fullname', '$_email', '$_phone', '$_gender', '$_position', '$_bank_name', '$_account_name', '$_account_number', '$_address')";

				if(mysqli_query($dbc, $sql)){
					echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Message: New employee Added Sucessfully</strong>
					</div>";
				}else {
					echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Oops): Error adding new employee.</strong>
					</div>";
				}				
			}
		?>
		<div class="well">
			<header class="text-center well color">
				<h3>Add New Employee</h3>
			</header>
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="form-group">
					<label for="fullname">Full Name:</label>
					<input type="text" name="fullname" id="fullname" class="form-control input-sm" placeholder="fullname" required autofocus>
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" name="email" id="email" class="form-control input-sm" placeholder="email" required>
				</div>
				<div class="form-group">
					<label for="phone">Phone:</label>
					<input type="tel" name="phone" id="phone" class="form-control input-sm" placeholder="phone" required>
				</div>
				<div class="row">
					<div class="col-xs-5">
						<div class="form-group">
            	<label for="gender">Gender:</label>
              <select name="gender" id="gender" class="form-control  input-sm">
              	<option value="Male">Male</option>
              	<option value="Female">Female</option>
              </select>
            </div>
					</div>
					<div class="col-xs-7">
						<div class="form-group">
							<label for="position">Position:</label>
							<input type="text" name="position" id="position" class="form-control  input-sm" placeholder="position" required>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="bank_name">Bank Name:</label>
					<input type="text" name="bank_name" id="bank_name" class="form-control input-sm" placeholder="bank name" required>
				</div>
				<div class="form-group">
					<label for="account_name">Account Name:</label>
					<input type="text" name="account_name" id="account_name" class="form-control input-sm" placeholder="account name" required>
				</div>
				<div class="form-group">
					<label for="account_number">Account Number:</label>
					<input type="number" name="account_number" id="account_number" class="form-control input-sm" placeholder="account number" maxlength="20" required>
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<textarea name="address" class="form-control input-sm" id="address" cols="30" rows="6" placeholder="address" style="max-width: 100%;"></textarea>
				</div>
				<button type="submit" name="add_employee" class="btn btn-primary btn-block btn-lg">Add new employee</button>
			</form>
		</div>
	</div>
</div>