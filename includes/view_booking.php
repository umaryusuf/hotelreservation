<div class="row">
	<div class="col-md-12">
		<div class="well well-sm">
			<h2 class="text-center">My Reservations</h2>
		</div>
	</div>
</div>
<br>
<div class="row">
<?php 	 

$q1 = mysqli_query($dbc, "SELECT * FROM `reserved_rooms` WHERE `user_id`='$user_id'");
while($row = mysqli_fetch_array($q1)){
	$reserved_id = $row["reserved_id"];
	$room_id = $row["room_id"];

?>
<div>
<?php 

$q = "SELECT * FROM `rooms` WHERE `room_id`='$room_id'";
$rq = mysqli_query($dbc, $q);

while ($row = mysqli_fetch_array($rq)) {
  $room_id = $row['room_id'];
  $room_image = $row['room_image'];
  $room_name = $row['room_name'];
  $room_price = $row['room_price'];
  $room_description = $row['room_description'];

?>
  <div class="col-md-4">
    <div class="well">
      <img class="img img-responsive" src="./admin/img/<?php echo $room_image; ?>" alt=" hotel room image" style="max-width: 100%;width:100%;height: 200px">
      <div>
        <h4 class="room-title"><?php echo ucfirst($room_name); ?></h4>
        <p class="room-price"><strong><span class="naira">N</span><?php echo $room_price; ?></strong></p>
        <p>
          <strong>free wifi</strong> 
          <span class="fa fa-wifi"></span>, &nbsp;
          <strong>HD tv</strong> 
          <span class="fa fa-desktop"></span> &nbsp; and more...
        </p>
        <p><?php echo $room_description; ?></p>
        <div class="row">
          <div class="col-xs-12">
            <form action="dashboard.php?action=view_booking" method="post">
              <input type="hidden" value="<?php echo $reserved_id; ?>" name="reserved_id">
              <button type="submit" class="btn btn-primary btn-block" name="unreserve">Un-reserve this room</button>
            </form>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
    
<?php } 

if (isset($_POST["unreserve"])) {
  $reserved_id = $_POST["reserved_id"];

  $q1 = "DELETE FROM `reserved_rooms` WHERE reserved_id='$reserved_id'";
  $q2 = "UPDATE `rooms` SET `booked`='0' WHERE `room_id`='$room_id'";

  if (mysqli_query($dbc, $q1) && mysqli_query($dbc, $q2)) {
    echo "<script>window.open('dashboard.php?action=unreserve_room', '_self');</script>";
    header("Location: ");
  } else {
    echo "<script>alert('Error occured while un-reserving room.');</script>";
  }
}
?> 
</div>
<?php } ?>
</div>
