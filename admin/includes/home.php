<div class="row">
	<div class="col-md-12">
		<header class="text-center">
			<div class="well">
				<h1 class="bold">Welcome <?php echo $_SESSION['admin'] ?></h1>
			</div>
		</header>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-green">
      <div class="panel-heading">
        <br>
        <div class="row">
          <div class="col-xs-3">
              <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge bold">We have 
						<?php  
                $query = mysqli_query($dbc, "SELECT COUNT(`id`) FROM `users`");
                $data1 = mysqli_fetch_array($query);
                echo "<span class='label label-primary'>" .$data1[0] ."</span>";
              ?>
            </div>
            <br>
            <div>
            	<h4><strong>Customers</strong></h4>
            </div>
          </div>
        </div>
        <br>
      </div>
      <a href="admin.php?action=customers">
        <div class="panel-footer">
          <span class="pull-left">View all customers</span>
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
            <div class="huge bold">We have 
              <?php  
                $query = mysqli_query($dbc, "SELECT COUNT(`reserved_id`) FROM `reserved_rooms`");
                $data2 = mysqli_fetch_array($query);
                echo "<span class='label label-primary'>" .$data2[0] ."</span>";
              ?>
            </div>
            <br>
            <div>
            	<h4><strong>Reserved rooms!</strong></h4>
            </div>
          </div>
        </div>
        <br>
      </div>
      <a href="admin.php?action=view_booked_rooms">
          <div class="panel-footer">
            <span class="pull-left">View Reserved Rooms</span>
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
              <i class="fa fa-home fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
              <div class="huge bold">We have 
							<?php  
                $query = mysqli_query($dbc, "SELECT COUNT(`room_id`) FROM `rooms` WHERE booked='0'");
                $data3 = mysqli_fetch_array($query);
                echo "<span class='label label-primary'>" .$data3[0] ."</span>";
              ?>
              </div>
              <br>
              <div>
              	<h4><strong>Availabe Rooms</strong></h4>
              </div>
          </div>
        </div>
        <br>
      </div>
      <a href="admin.php?action=rooms">
          <div class="panel-footer">
            <span class="pull-left">View availble rooms</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
      </a>
  	</div>
	</div>	
</div>
<div class="row">
  <div class="col-md-4">
		<div class="panel panel-primary">
      <div class="panel-heading">
        <br>
        <div class="row">
          <div class="col-xs-3">
              <i class="fa fa-home fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
              <div class="huge bold">We have 
							<?php  
                $query = mysqli_query($dbc, "SELECT  COUNT(`room_id`) FROM `rooms`");
                $data4 = mysqli_fetch_array($query);
                echo "<span class='label label-primary'>" .$data4[0] ."</span>";

              ?>
              </div>
              <br>
              <div>
              	<h4><strong>Rooms</strong></h4>
              </div>
          </div>
        </div>
        <br>
      </div>
      <a href="admin.php?action=view_all_rooms">
          <div class="panel-footer">
            <span class="pull-left">View all rooms</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
      </a>
  	</div>
	</div>
  <div class="col-md-4">
		<div class="panel panel-green">
      <div class="panel-heading">
        <br>
        <div class="row">
          <div class="col-xs-3">
              <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge bold">We have 
						<?php  
                $query = mysqli_query($dbc, "SELECT COUNT(`employee_id`) FROM `employee`");
                $data5 = mysqli_fetch_array($query);
                echo "<span class='label label-primary'>" .$data5[0] ."</span>";
              ?>
            </div>
            <br>
            <div>
            	<h4><strong>Employees</strong></h4>
            </div>
          </div>
        </div>
        <br>
      </div>
      <a href="admin.php?action=employees">
        <div class="panel-footer">
          <span class="pull-left">View all employees</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
	  </div>
	</div>
	<!--  -->
  <div class="col-md-4">
		<div class="panel panel-yellow">
      <div class="panel-heading">
        <br>
        <div class="row">
          <div class="col-xs-3">
              <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge bold">We have 
              <?php  
                $query = mysqli_query($dbc, "SELECT COUNT( DISTINCT `user_id`) FROM `reserved_rooms`");
                $data6 = mysqli_fetch_array($query);
                echo "<span class='label label-primary'>" .$data6[0] ."</span>";
              ?>
            </div>
            <br>
            <div>
            	<h4><strong>Booked Customer!</strong></h4>
            </div>
          </div>
        </div>
        <br>
      </div>
      <a href="admin.php?action=view_booked_customers">
          <div class="panel-footer">
            <span class="pull-left">View Booked Customers</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
      </a>
    </div>
	</div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="panel panel-green">
      <div class="panel-heading">
        <br>
        <div class="row">
          <div class="col-xs-3">
              <i class="fa fa-envelope-o fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge bold">We have 
            <?php  
              $query = mysqli_query($dbc, "SELECT COUNT(`message_id`) FROM `admin_messages`");
              $data = mysqli_fetch_array($query);
              echo "<span class='label label-primary'>" .$data[0] ."</span>";
            ?>
            </div>
            <br>
            <div>
              <h4><strong>Messages</strong></h4>
            </div>
          </div>
        </div>
        <br>
      </div>
      <a href="admin.php?action=messages">
        <div class="panel-footer">
          <span class="pull-left">View all messages</span>
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
              <i class="fa fa-envelope-o fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge bold">We have 
              <?php  
                $query = mysqli_query($dbc, "SELECT COUNT(`message_id`) FROM `admin_messages` WHERE viewed='1'");
                $data6 = mysqli_fetch_array($query);
                echo "<span class='label label-primary'>" .$data6[0] ."</span>";
              ?>
            </div>
            <br>
            <div>
              <h4><strong>Read Messages!</strong></h4>
            </div>
          </div>
        </div>
        <br>
      </div>
      <a href="admin.php?action=read_messages">
          <div class="panel-footer">
            <span class="pull-left">View Read Messages</span>
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
              <i class="fa fa-comments-o fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
              <div class="huge bold">We have 
              <?php  
                $query = mysqli_query($dbc, "SELECT  COUNT(`message_id`) FROM `admin_messages` WHERE viewed='0'");
                $data4 = mysqli_fetch_array($query);
                echo "<span class='label label-primary'>" .$data4[0] ."</span>";

              ?>
              </div>
              <br>
              <div>
                <h4><strong>New Messages</strong></h4>
              </div>
          </div>
        </div>
        <br>
      </div>
      <a href="admin.php?action=un_read_messages">
          <div class="panel-footer">
            <span class="pull-left">View all new messages</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
      </a>
    </div>
  </div>
</div>