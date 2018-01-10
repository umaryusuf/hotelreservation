<?php  
session_start();

$page_title = "Login Page";
$message = "";

if(isset($_POST['login'])){

	require_once 'connect.php';

	$username = test_input($_POST['username']);
	$password = md5(test_input($_POST['password']));

	$query = "SELECT `username` FROM `users` WHERE `username`='$username'";
	$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
  $result = mysqli_query($dbc, $query);
	$run = @mysqli_query($dbc, $sql);
  $count = @mysqli_num_rows($result);
  $sucess = @mysqli_num_rows($run);

  if($count == 0){
  	$message = "Username does not exist";
  }else if($sucess){
		$_SESSION['user'] = $username;
		header("location: dashboard.php");
		mysql_close($dbc);
	}else{
		$message = "Invalid username or password";
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
<!doctype html>
<html lang="en">
  <head>
    <?php include_once 'includes/head.php'; ?>
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
				<div class="col-md-4 col-md-offset-4">
					<?php 
						if($message != ''){
							echo "
								<div class='alert alert-danger'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<strong>Failed to login: </strong>".$message."
								</div>";
						}
					?>
					<br><br>
					<div class="panel panel-default">
						<div class="panel-heading color">
							<h4 class="text-center">Login</h4>
						</div>
						<div class="panel-body">
							<form action="login.php" method="POST" >
	              <label for="username">Username:</label>
	              <div class="form-group input-group">
	                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                  <input type="text" class="form-control" id="username" name="username" placeholder="username" required autofocus>
	              </div>
	              <label for="password">Password:</label>
	              <div class="form-group input-group">
	                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                  <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
	              </div>
	              <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
	            </form>
						</div>
						<div class="panel-footer color">
							<p>Don't have an account? <a href="register.php">register</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>