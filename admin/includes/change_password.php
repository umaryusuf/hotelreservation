<?php  

$messages = $err_msg = $current_passwordErr = $new_passwordErr = $repeat_passwordErr = "";
$error = false;

?>

<div class="row">
	<div class="col-md-12">
		<header class="well well-sm">
			<h3 class="text-center">Change Password</h3>
		</header>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		
		<?php  
			if (isset($_POST["change_password"])) {
				if (empty($_POST["current_password"])) {
					$error = true;
					$current_passwordErr = "current password is empty";
				}else{
					$current_password = $_POST["current_password"];
				}

				if (empty($_POST["new_password"])) {
					$error = true;
					$new_passwordErr = "current password is empty";
				}else{
					$new_password = $_POST["new_password"];
				}

				if (empty($_POST["repeat_password"])) {
					$error = true;
					$repeat_passwordErr = "current password is empty";
				}else{
					$repeat_password = $_POST["repeat_password"];
				}

				if (!$error) {
					$current_password = md5($current_password);
					$query = mysqli_query($dbc, "SELECT * FROM admin");
					while($row = mysqli_fetch_array($query)){
						$id = $row["id"];
						$password = $row["password"];

						if($current_password == $password){
							if (strlen($new_password) < 6) {
								$new_passwordErr = "New password must be greater than 6 characters";
							}else{
								if($new_password == $repeat_password){
									$new_password = md5($new_password);
									$sucess = mysqli_query($dbc, "UPDATE admin SET password='$new_password' WHERE id='$id'");
									if($sucess){
										$message = "Password updated sucessfully.";
									}else{
										$err_msg = "Error updating password";
									}

								}else{
									$repeat_passwordErr = "Repeat password does not match new password.";
								}
							}
							
						}else{
							$current_passwordErr = "Invalid current password.";
						}
					}
					
				}

			}

			if (!empty($message)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Sucess: ". $message. "</strong>
					</div>";
			}
			if (!empty($err_msg)) {
				echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Error: ". $err_msg. "</strong>
					</div>";
			} elseif (!empty($current_passwordErr)) {
				echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Error: ". $current_passwordErr. "</strong>
					</div>";
			} elseif (!empty($new_passwordErr)) {
				echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Error: ". $new_passwordErr. "</strong>
					</div>";
			}
			 elseif (!empty($repeat_passwordErr)) {
				echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Error: ". $repeat_passwordErr. "</strong>
					</div>";
			}

		?>
	</div>
</div>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading color">
				Change password
			</div>
			<div class="panel-body">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" role="form">
					<div class="form-group">
						<label for="current_password">Current Password:</label>
						<input type="password" name="current_password" id="current_password" class="form-control" placeholder="current password" required>
					</div>
					<div class="form-group">
						<label for="new_password">New Password:</label>
						<input type="password" name="new_password" minlength="6" id="new_password" class="form-control" placeholder="new password" required>
					</div>
					<div class="form-group">
						<label for="repeat_password">Repeat Password:</label>
						<input type="password" name="repeat_password"  minlength="6" id="repeat_password" class="form-control" placeholder="repeat password" required>
					</div>
					<button type="submit" class="btn btn-primary btn-block" name="change_password">Change Password</button>
				</form>
			</div>
		</div>
	</div>
</div>