<div class="row">	
	<div class="col-md-12">
	  <header class="text-center">
	  	<div class="well">
        <h2><strong>Welcome to Automation of Hotel Reservation</strong></h2>
        <h3 class="text-success"><strong>Your status:</strong></h3>  
      </div>
	  </header>
	  <br>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-green">
      <div class="panel-heading">
        <br>
        <div class="row">
          <div class="col-xs-3">
              <i class="fa fa-home fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge bold">Reserve a room</div>
            <div>Room Details!</div>
          </div>
        </div>
        <br>
      </div>
      <a href="dashboard.php?action=reservation">
        <div class="panel-footer">
          <span class="pull-left">Reserve a room</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
	  </div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-yellow">
      <div class="panel-heading">
        <br>
        <div class="row">
          <div class="col-xs-3">
              <i class="fa fa-shopping-cart fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge bold">You have 
              <?php  
                $query = mysqli_query($dbc, "SELECT COUNT(`reserved_id`) FROM `reserved_rooms` WHERE user_id='$user_id'");
                $data = mysqli_fetch_array($query);
                echo "<span class='label label-primary'>" .$data[0] ."</span>";
              ?>
            </div>
            <div>reserved rooms!</div>
          </div>
        </div>
        <br>
      </div>
      <a href="dashboard.php?action=view_booking">
          <div class="panel-footer">
            <span class="pull-left">View Reservation Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
      </a>
    </div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
      <div class="panel-heading">
        <br>
        <div class="row">
          <div class="col-xs-3">
              <i class="fa fa-envelope fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
              <div class="huge bold">Contact Admin</div>
              <div>Message Admin</div>
          </div>
        </div>
        <br>
      </div>
      <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Contact admin</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
      </a>
  	</div>
	</div>	
</div>
<div class="row">
  <div class="col-md-7"></div>
  <div class="col-md-5"></div>
</div>
