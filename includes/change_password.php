<?php  

$message = "";

if(isset($_POST['change_password'])){
	$currentPassword = $_POST['currentPassword'];
	$currentPassword = md5($currentPassword);
	$newPassword = $_POST['newPassword'];
	$confirmPassword = $_POST['confirmPassword'];

	if($newPassword !== $confirmPassword){
		$message = "Passwords do not match";
	}else{
		$checkPass = mysqli_query($dbc, "SELECT * FROM `users` WHERE `id`='$user_id'");
		$row = mysqli_fetch_array($checkPass);

		if ($currentPassword === $row['password']) {
			$newPassword = md5($newPassword);
			$query = "UPDATE `users` SET `password`='$newPassword' WHERE `id`='$user_id'";
			if(mysqli_query($dbc, $query)){
				$message = "Password changed sucessfully";
			}
		}else{
			$message = "Current password not correct";
		}
	}
	
}

function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = strip_tags($data);
	$data = htmlspecialchars($data);
 	return $data;
}
?>

<div class="col-md-4 col-md-offset-4">
	<?php 
		if($message != ''){
			echo "
				<div class='alert alert-info'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Message: </strong>".$message."
				</div>";
		}
	?>
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h3>Change password</h3>
		</div>
		<div class="panel-body">
			<form action="dashboard.php?action=change_password" method="POST" name="frmChange" onSubmit="return validatePassword()">
				<div class="form-group">
					<label for="currentPassword">Current Password</label>
					<input type="password" class="form-control" name="currentPassword" id="currentPassword" placeholder="Enter old password" autofocus required>
					<span class="text-danger" id="oldPasswordError"></span>
				</div>
				<div class="form-group">
					<label for="newPassword">New Password:</label>
					<input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Enter new password" required>
					<span class="text-danger" id="newPasswordError"></span>
				</div>
				<div class="form-group">
					<label for="confirmPassword">Re-enter Password:</label>
					<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="New password again" required>
					<span class="text-danger" id="confirmPasswordError"></span>
				</div>
				<button type="submit" class="btn btn-default btn-lg btn-block" name="change_password">Change Password</button>
			</form>
		</div>
	</div>
</div>