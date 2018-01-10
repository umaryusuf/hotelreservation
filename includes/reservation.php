<div class="row">   
    <div class="col-md-12">
      <div class="well well-sm">
        <header class="text-center">
          <h2>Welcome to Automation of hotel reservation</h2>
          <h3>Here are the list of our available rooms</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, ipsam iusto blanditiis ipsum totam atque, dolore nam rem maiores expedita qui aut ad rerum facere, dicta deleniti cum quaerat. Consectetur.</p>
        </header>
      </div>
    </div>
</div>
<br>
<div class="row">
<?php 


$q = "SELECT * FROM `rooms` WHERE `booked`='0'";
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
            <form action="dashboard.php?action=reservation" method="post">
              <input type="hidden" value="<?php echo $room_id; ?>" name="room_id">
              <button type="submit" class="btn btn-primary btn-block" name="reserve">Reserve this room</button>
            </form>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
    
<?php 
 }// end while loop

if (isset($_POST["reserve"])) {
  $room_id = $_POST["room_id"];
  //echo $user_id . " ". $room_id;
  $q1 = "INSERT INTO `reserved_rooms` (`user_id`, `room_id`) VALUES('$user_id', '$room_id')";
  $q2 = "UPDATE `rooms` SET `booked`='1' WHERE `room_id`='$room_id'";

  if (mysqli_query($dbc, $q1) && mysqli_query($dbc, $q2)) {
    echo "<script>window.open('dashboard.php?action=success', '_self');</script>";
    header("Location: ");
  } else {
    echo "<script>alert('Error occured while booking room.');</script>";
  }
}
?>
</div>