<?php 
	session_start();
	$message = "";

	require_once '../connect.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = test_input($username);
		$password = md5($password);

		$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
		$run_sql = mysqli_query($dbc, $sql);

		if(mysqli_num_rows($run_sql) > 0 ){
			$_SESSION['admin'] = $username;
			header("location: admin.php"); // redirect to home page
  		mysqli_close($dbc);
		}else{
			$message = "Invalid username or password";
		}

	}

	function test_input($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

	 	return $data;
	}
?>

<!doctype html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">

      <title>Admin Login</title>

      <link rel="shortcut icon" href="">
      <!-- Place favicon.ico in the root directory -->

      <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
      <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <section class="container">
				<div class="row">
					<div class="well text-center">
						<h2>Welcome to Site Admin</h2>
						<p>Please login to continue</p>
					</div>
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
						<div class="panel panel-default" style="margin: 10px 0">
							<div class="panel-heading"  style="background-color: #2c3e50 !important;color: #fff">
								<h4 class="text-center">Sign In</h4>
							</div>
							<div class="panel-body">
								<form role="form" method="POST" action="index.php">
								  <label for="username">Username:</label>
				              <div class="form-group input-group">
				                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				                  <input type="text" class="form-control" id="username" name="username" placeholder="username" required autofocus>
				              </div>
				              <label for="password">Password:</label>
				              <div class="form-group input-group">
				                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				                  <input type="password" class="form-control " id="password" name="password" placeholder="password" required>
				              </div>
								  <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Login</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>


      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>
