<?php 
session_start();

$page_title = "Register Page";
$error = false;

$firstnameErr = $lastnameErr = $usernameErr = $passwordErr = $password2Err = $phoneErr = $emailErr = $cityErr = $countryErr = $stateErr = "";

function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = strip_tags($data);
	$data = htmlspecialchars($data);
 	return $data;
}

if(isset($_POST['register'])){

	require_once 'connect.php';

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = test_input($_POST['username']);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$state = $_POST['state'];


	if(empty($firstname)){
		$error = true;
		$firstnameErr = "firstname field is empty";
	}else if(strlen($firstname) < 2){
		$error = true;
		$firstnameErr = "firstname should not be less than 2 characters";
	}else{
		$firstname = test_input($firstname);
	}

	if(empty($lastname)){
		$error = true;
		$lastnameErr = "lastname field is empty";
	}else if(strlen($lastname) < 2){
		$error = true;
		$lastnameErr = "lastname should not be less than 2 characters";
	}else{
		$lastname = test_input($lastname);
	}

	if(empty($username)){
		$error = true;
		$usernameErr = "username field is empty";
	}else if(strlen($username) < 6){
		$error = true;
		$usernameErr = "username should be more than 6 characters";
	}else{
		// check username exist or not
    $query = "SELECT `username` FROM `users` WHERE `username`='$username'";
    $result = mysqli_query($dbc, $query);
    $count = mysqli_num_rows($result);
    if($count!=0){
    	$error = true;
    	$usernameErr = "username is already in use.";
    }
	}

	if(empty($password)){
		$error = true;
		$passwordErr = "password field is empty";
	}else if(strlen($password) < 6){
		$error = true;
		$passwordErr = "Password should not be less than 6 characters";
	}else{
		$password = test_input($password);
	}

	if(empty($password2)){
		$error = true;
		$password2Err = "password2 field is empty";
	}else if(strlen($password2) < 6 && $password2 !== $password){
		$error = true;
		$password2Err = "do not match";
	}else{
		$password2 = test_input($password2);
	}

	if(empty($phone)){
		$error = true;
		$phoneErr = "phone field is empty";
	}else{
		$phone = test_input($phone);
	}

	if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailErr = "Please enter valid email address.";
  }else if(empty($email)){
  	$error = true;
  	$emailErr = "email field is empty";
  } else {
  	$email = test_input($email);
  }

  if(empty($city)){
		$error = true;
		$cityErr = "city field is empty";
	}else{
		$city = test_input($city);
	}

	if(empty($country)){
		$error = true;
		$countryErr = "country field is empty";
	}else{
		$country = test_input($country);
	}

	if(empty($state)){
		$error = true;
		$stateErr = "state field is empty";
	}else{
		$state = test_input($state);
	}

	if(!$error){
		$password = md5($password);

		$query = "INSERT INTO `users` (`firstname`, `lastname`, `username`, `password`, `phone`, `email`, `gender`, `city`, `country`, `state`) VALUES ('$firstname', '$lastname', '$username', '$password', '$phone', '$email', '$gender', '$city', '$country', '$state')";

		if(mysqli_query($dbc, $query)){

			$_SESSION['user'] = $username;
			header("location: dashboard.php");
		}
	}

}

?>

<!doctype html>
<html lang="en">
  <head>
    <?php require_once 'includes/head.php'; ?>
  </head>
  <body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    
    <!--site navigation -->
    <?php require_once 'includes/nav.php'; ?>

		<!-- main content -->
    <section class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default" style="margin: 10px 0">
						<div class="panel-heading color">
							<h4 class="text-center">Create a new account</h4>
						</div>
						<div class="panel-body">
							<form role="form" method="POST" action="register.php" name="registerForm" id="registerForm">
								<p class="text-danger">All fileds are required *</p>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
			              	<label for="firstname">First Name: <span class="text-danger">*</span></label>
			                <input type="text" class="form-control input-sm" id="firstname" name="firstname" placeholder="firstname" required autofocus>
			                <span class="text-danger" id="firstnameErr"><?php if($firstnameErr != ''){ echo $firstnameErr;} ?></span>
			              </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
			              	<label for="lastname">Last Name: <span class="text-danger">*</span></label>
			                <input type="text" class="form-control input-sm" id="lastname" name="lastname" placeholder="lastname" required>
			                <span class="text-danger" id="lastnameErr"><?php if($lastnameErr != ''){ echo $lastnameErr;} ?></span>
			              </div>
	              	</div>
								</div>
	              <div class="form-group">
	              	<label for="username">Username: <span class="text-danger">* </span>&nbsp;<span class="text-info">minimum of six characters</span></label>
	                <input type="text" class="form-control input-sm" id="username" name="username" placeholder="username" minlength="6" maxlength="20" required>
	                <span class="text-danger" id="usernameErr"><?php if($usernameErr != ''){ echo $usernameErr;} ?></span>
	              </div>
	              <div class="row">
	              	<div class="col-md-6">
	              		<div class="form-group">
			              	<label for="password">Password: <span class="text-danger">* </span>&nbsp;<span class="text-info">minimum of six characters</span></label>
			                <input type="password" class="form-control input-sm" id="password" name="password" placeholder="password" minlength="6" maxlength="20" required>
			                <span class="text-danger" id="passwordErr"><?php if($passwordErr != ''){ echo $passwordErr;} ?></span>
			              </div>
	              	</div>
	              	<div class="col-md-6">
	              		<div class="form-group">
			              	<label for="password">Re-enter Password: <span class="text-danger">*</span></label>
			                <input type="password" class="form-control input-sm" id="password" name="password2" placeholder="password again" minlength="6" maxlength="20" required>
			                <span class="text-danger" id="password2Err"><?php if($password2Err != ''){ echo $password2Err;} ?></span>
			              </div>
	              	</div>
	              </div>		
	              <div class="row">
	              	<div class="col-md-6">
	              		<div class="form-group">
			              	<label for="phone">Phone: <span class="text-danger">*</span></label>
			                <input type="tel" class="form-control input-sm" id="phone" name="phone" placeholder="your phone number" required>
			                <span class="text-danger" id="phoneErr"><?php if($phoneErr != ''){ echo $phoneErr;} ?></span>
		              	</div>
	              	</div>
	              	<div class="col-md-6">
	              		<div class="form-group">
			              	<label for="email">Email: <span class="text-danger">*</span></label>
			                <input type="email" class="form-control input-sm" id="email" name="email" placeholder="you@yourmail.com" required>
			                <span class="text-danger" id="emailErr"><?php if($emailErr != ''){ echo $emailErr;} ?></span>
			              </div>
	              	</div>
	              </div>    
	              <div class="row">
	              	<div class="col-xs-5">
	              		<div class="form-group">
			              	<label for="gender">Gender: <span class="text-danger">*</span></label>
			                <div class="radio" required>
			                	<label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
												<label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
			                </div>
			              </div>
	              	</div>
	              	<div class="col-xs-7">
	              		<div class="form-group">
			              	<label for="country">Country: <span class="text-danger">*</span></label>
			                <input type="text" class="form-control input-sm" id="country" name="country" placeholder="country" required>
			                <span class="text-danger" id="countryErr"><?php if($countryErr != ''){ echo $countryErr;} ?></span>
		              	</div>
	              	</div>
	              </div>
	              <div class="row">
	              	<div class="col-xs-6">
	              		<div class="form-group">
			              	<label for="city">City: <span class="text-danger">*</span></label>
			                <input type="text" class="form-control input-sm" id="city" name="city" placeholder="city" required>
			                <span class="text-danger" id="cityErr"><?php if($cityErr != ''){ echo $cityErr;} ?></span>
		              	</div>
	              	</div>
	              	<div class="col-xs-6">
	              		<div class="form-group">
			              	<label for="state">State: <span class="text-danger">*</span></label>
			                <input type="text" class="form-control input-sm" id="state" name="state" placeholder="state" required autofocus>
			                <span class="text-danger" id="stateErr"><?php if($stateErr != ''){ echo $stateErr;} ?></span>
			              </div>
	              	</div>
	              </div>
							  <button type="submit" id="register" class="btn btn-primary btn-block" name="register"> 
							  	Create new account
							  </button>
							</form>
						</div>
						<div class="panel-footer color">
							<p>Already have an account? <a href="login.php">login to your account</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
  
  		$(function(){
  			$("#register").submit(function(event) {
  				e.preventDefault();
  				console.log();
  			});
  		})
  
    </script>
  </body>
</html>