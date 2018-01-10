<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php 
			$employee_id = $_GET["edit_id"];

			function test_input($data){
				$data = trim($data);
				$data = stripcslashes($data);
				$data = strip_tags($data);
				$data = htmlspecialchars($data);
			 	return $data;
			}

			if(isset($_POST["update_employee"])){

				$_fullname  = test_input($_POST['fullname']);
				$_email  = test_input($_POST['email']);
				$_phone  = test_input($_POST['phone']);
				$_gender  = test_input($_POST['gender']);
				$_position  = test_input($_POST['position']);
				$_bank_name  = test_input($_POST['bank_name']);
				$_account_name  = test_input($_POST['account_name']);
				$_account_number  = test_input($_POST['account_number']);
				$_address  = test_input($_POST['address']);

				$sql = "UPDATE `employee` SET `fullname`='$_fullname', `email`='$_email', `phone`='$_phone',  `gender`='$_gender', `position`='$_position', `bank_name`='$_bank_name', `account_name`='$_account_name', `account_number`='$_account_number', `address`='$_address' WHERE `employee_id`='$employee_id'";

				if(mysqli_query($dbc, $sql)){
					echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Message: Employee Updated Sucessfully</strong>
					</div>";
				}else {
					echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Message: Error updating employee.</strong>
					</div>";
				}				
			}
		?>
		<div class="well">
			<header class="text-center well color">
				<h3>Edit Employee Details</h3>
			</header>
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
				<?php  
				$sql = "SELECT * FROM `employee` WHERE employee_id='$employee_id'";
					$r_sql = mysqli_query($dbc, $sql); 

					while($row = mysqli_fetch_array($r_sql)){

				?>
				<div class="form-group">
					<label for="fullname">Full Name:</label>
					<input type="text" name="fullname" id="fullname" class="form-control input-sm" placeholder="fullname" required value="<?php echo $row['fullname']; ?>">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" name="email" id="email" class="form-control input-sm" value="<?php echo $row['email']; ?>" placeholder="email" required>
				</div>
				<div class="form-group">
					<label for="phone">Phone:</label>
					<input type="tel" name="phone" id="phone" class="form-control input-sm" value="<?php echo $row['phone']; ?>" placeholder="phone" required>
				</div>
				<div class="row">
					<div class="col-xs-5">
						<div class="form-group">
            	<label for="gender">Gender:</label>
              <select name="gender" id="gender" class="form-control  input-sm">
              	<option selected value="<?php echo $row['gender']; ?>"><?php echo $row["gender"]; ?></option>
              	<option value="Male">Male</option>
              	<option value="Female">Female</option>
              </select>
            </div>
					</div>
					<div class="col-xs-7">
						<div class="form-group">
							<label for="position">Position:</label>
							<input type="text" name="position" id="position" class="form-control  input-sm" value="<?php echo $row['position']; ?>" placeholder="position" required>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="bank_name">Bank Name:</label>
					<input type="text" name="bank_name" id="bank_name" class="form-control input-sm" value="<?php echo $row['bank_name']; ?>" placeholder="bank name" required>
				</div>
				<div class="form-group">
					<label for="account_name">Account Name:</label>
					<input type="text" name="account_name" id="account_name" class="form-control  input-sm" placeholder="account name" value="<?php echo $row['account_name']; ?>" required>
				</div>
				<div class="form-group">
					<label for="account_number">Account Number:</label>
					<input type="number" name="account_number" id="account_number" class="form-control  input-sm" placeholder="account number" value="<?php echo $row['account_number']; ?>" required>
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<textarea name="address" class="form-control input-sm" id="address" cols="30" rows="4" placeholder="address" style="max-width: 100%;"><?php echo $row["address"]; ?></textarea>
				</div>
				<?php } ?>
				<button type="submit" name="update_employee" class="btn btn-primary btn-block btn-lg">Update employee</button>
			</form>
		</div>
	</div>
</div>