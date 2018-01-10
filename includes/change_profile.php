<?php
ob_start();
session_start();
$message = "";

if (isset($_POST['update'])) {
	$_firstname  = test_input($_POST['firstname']);
	$_lastname  = test_input($_POST['lastname']);
	$_email  = test_input($_POST['email']);
	$_phone  = test_input($_POST['phone']);
	$_gender  = test_input($_POST['gender']);
	$_city  = test_input($_POST['city']);
	$_country  = test_input($_POST['country']);
	$_state  = test_input($_POST['state']);

	$sql = "UPDATE `users` SET `firstname`='$_firstname', `lastname`='$_lastname', `phone`='$_phone', `email`='$_email', `gender`='$_gender', `city`='$_city', `country`='$_country', `state`='$_state' WHERE `id`='$user_id'";

	echo $user_id;

	if(mysqli_query($dbc, $sql)){
		$message = "Profile updated sucessfully.";
	}else {
		$message = "Error updating your profile.";
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
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php 
			if($message != ''){
				echo "
					<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Message: </strong>".$message."
					</div>";
			}
		?>
		<h1 class="text-center">Update Profile Info</h1>
		<!-- <div class="well"> -->
			<form action="dashboard.php?action=change_profile" method="POST" class="form-horizontal">
				<?php 
					$username = $_SESSION['user'];
					$query = "SELECT * FROM `users` WHERE `username`='$username'";
					$result = mysqli_query($dbc, $query);

					if(mysqli_num_rows($result) > 0) {
					    while($data = mysqli_fetch_assoc($result)){

				?>
				<div class="form-group">
					<label for="firstname" class="control-label col-sm-3">First Name:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="firstname" value="<?php echo $data['firstname']; ?>" id="firstname" placeholder="Enter firstname" required autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="lastname" class="control-label col-sm-3">Last Name:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="lastname" value="<?php echo $data['lastname']; ?>" id="lastname" placeholder="Enter lastname" required >
					</div>
				</div>
				<div class="form-group">
	    		<label class="control-label col-sm-3" for="email">Email:</label>
			    <div class="col-sm-9">
			      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $data['email']; ?>"	>
			    </div>
			  </div>
				<div class="form-group">
					<label for="phone" class="control-label col-sm-3">Phone:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="phone" value="<?php echo $data['phone']; ?>" id="phone" placeholder="Enter phone" required>
					</div>
				</div>
				<div class="form-group">
					<label for="country" class="control-label col-sm-3">Gender:</label>
					<div class="col-sm-9">
						<select name="gender" id="gender" class="form-control">
							<option selected value="<?php echo $data['gender']; ?>"><?php echo ucfirst($data['gender']); ?></option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="city" class="control-label col-sm-3">City:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="city" value="<?php echo $data['city']; ?>" id="city" placeholder="Enter city" required>
					</div>
				</div>
				<div class="form-group">
					<label for="country" class="control-label col-sm-3">Country:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="country" value="<?php echo $data['country']; ?>" id="country" placeholder="Enter country" required>
					</div>
				</div>
				<div class="form-group">
					<label for="state" class="control-label col-sm-3">State:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="state" value="<?php echo $data['state']; ?>" id="state" placeholder="Enter state" required>
					</div>
				</div>
				<?php } } ?>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<button class="btn btn-default btn-lg" name="update">Update Profile</button>
					</div>
				</div>
				
				
			</form>
		<!-- </div> -->
	</div>
</div>