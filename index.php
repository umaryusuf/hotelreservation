<?php 
	$page_title = "Homepage"; 
	$heading = "Automation of Hotel Reservation";
	$sub_heading = "The best online automation of hotel reservation";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'includes/head.php'; ?>
<body>
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

	<!--site navigation -->
  <?php require_once 'includes/nav.php'; ?>

  <!-- main content -->
  <section class="container-fluid">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		    <li data-target="#myCarousel" data-slide-to="3"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="assets/img/slider/first.jpg" alt="">
		      <div class="carousel-caption">
		        <h1 class="text-center white"><?php echo $heading; ?></h1>
						<p>
							<?php echo $sub_heading; ?> <br> <a href="register.php" class="btn btn-primary action">Get Started</a>
						</p>
						<br>
		      </div>
		    </div>

		    <div class="item">
		      <img src="assets/img/slider/second.jpg" alt="">
		      <div class="carousel-caption">
		        <h1 class="text-center white"><?php echo $heading; ?></h1>
						<p>
						<?php echo $sub_heading; ?> <br> <a href="register.php" class="btn btn-primary action">Get Started</a>
						</p>
						<br>
		      </div>
		    </div>

		    <div class="item">
		      <img src="assets/img/slider/third.jpg" alt="">
		      <div class="carousel-caption">
		        <h1 class="text-center white"><?php echo $heading; ?></h1>
						<p>
							<?php echo $sub_heading; ?> <br> <a href="register.php" class="btn btn-primary action">Get Started</a>
						</p>
						<br>
		      </div>
		    </div>

		    <div class="item">
		      <img src="assets/img/slider/fourth.jpeg" alt="">
		      <div class="carousel-caption">
		        <h1 class="text-center white"><?php echo $heading; ?></h1>
						<p>
							<?php echo $sub_heading; ?> <br> <a href="register.php" class="btn btn-primary action">Get Started</a>
						</p>
						<br>
		      </div>
		    </div>
		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</section>
	<br>
	<section class="container-fluid">
		<div class="row">
			<!-- begin main content -->
			<div class="col-md-9">
				<div class="row text-center">
					<h2>Customer Service</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae nisi laborum cum, molestias harum autem molestiae voluptates magnam.</p>
				</div>
				<div class="row stats-row">
					<div class="stats-col text-center col-md-4 col-sm-6">
            <div class="circle">
              <span class="stats-no" data-toggle="counter-up">231</span> Satisfied Customers
            </div>
          </div>

					<div class="stats-col text-center col-md-4 col-sm-6">
            <div class="circle">
              <span class="stats-no" data-toggle="counter-up">24</span> Hours of Service
            </div>
          </div>

					<div class="stats-col text-center col-md-4 col-sm-6">
            <div class="circle">
              <span class="stats-no" data-toggle="counter-up">250</span> Amazing rooms
            </div>
          </div>
				</div>
				<br><br>
				<h2 class="text-center">Our amazing rooms</h2>
				<h4 class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam dolorum unde officia quam quis, iusto quaerat odio, delectus cum doloribus iste harum vitae assumenda fugiat debitis. Vel, eligendi distinctio explicabo.</h4>
				<br>
				<div class="row">
					<div class="col-md-4">
						<div class="well">
      				<img class=" img img-responsive" src="assets/img/first.jpg" alt=" hotel room image" style="max-width: 100%;">
      				<div>
      					<br>
				        <p><strong>free wifi</strong> <span class="fa fa-wifi"></span></p>
				        <p>This is a room with a great ventilation system, the room also has a good water and electrical supply.</p>
				      </div>
				    </div>
					</div>
					<div class="col-md-4">
						<div class="well">
      				<img class="img img-responsive" src="assets/img/fourth.jpeg" alt=" hotel room image" style="max-width: 100%;">
      				<div>
      					<br>
				        <p><strong>free wifi</strong> <span class="fa fa-wifi"></span></p>
				        <p>This is a room with a great ventilation system, the room also has a good water and electrical supply.</p>
				      </div>
				    </div>
					</div>
					<div class="col-md-4">
						<div class="well">
      				<img class="img img-responsive" src="./admin/img/crib-5.jpg" alt=" hotel room image" style="max-width: 100%;">
      				<div>
      					<br>
				     		<p><strong>free wifi</strong> <span class="fa fa-wifi"></span></p>
				        <p>This is a room with a great ventilation system, the room also has a good water and electrical supply.</p>
				      </div>
				    </div>
					</div>
				</div>
			</div>

			<!-- aside content -->
			<div class="col-md-3">
				<div class="newsletter bg-primary">
					<h4>Sign up for our newsletter</h4>
					<form action="#" class="form-inline" method="POST" >
						<input type="email" name="email" class="form-control input-sm" placeholder="you@yourmail.com" required>
						<button type="submit" name="newsletter" class="btn btn-default btn-sm">Sign Up</button>
					</form>
				</div>
				<br>
				<div>
					<div  class="bg-primary aside-content">
						<h4>Sidebar Content</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis tempore unde, provident magnam laboriosam, totam corrupti ducimus.</p>
						<br>
						<img src="assets/img/one.jpg" alt="" class="img-responsive" style="height: auto;">
						<p>Similique nam quisquam ea facere aspernatur accusantium</p>
					</div>
					<br>
					<div  class="bg-primary aside-content">
						<h4>Some Adverts</h4>
						<p>At officiis fugit fugiat quasi laborum aliquam voluptate dolorem corporis odio optio a eaque 
						<img src="assets/img/four.jpg" alt="" class="img-responsive" style="width:100%;height: 180px;">
						sunt architecto tempore eveniet, et nobis iste tempora nihil neque iusto suscipit blanditiis quisquam. Optio, voluptas.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<?php require_once 'includes/footer.php'; ?>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/counterup.min.js"></script>
	<script>
		$('[data-toggle="counter-up"]').counterUp({
	    delay: 10,
	    time: 1000
	  });
	</script>
</body>
</html>