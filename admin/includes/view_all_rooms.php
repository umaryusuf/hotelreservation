<div class="row">
  <div class="col-md-12">
    <div class="btn-group btn-group-justified">
      <a href="admin.php?action=rooms" class="btn btn-primary">Available room</a>
      <a href="admin.php?action=add_room" class="btn btn-primary">Add room</a>
      <a href="admin.php?action=view_booked_rooms" class="btn btn-primary">Booked rooms</a>
      <a href="admin.php?action=view_all_rooms" class="btn btn-primary active">All rooms</a>
    </div>
  </div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<header class="text-center well well-sm">
			<h1>View All Rooms</h1>
		</header>
	</div>
</div>   
<br>
<div class="row">
<?php 

$q = "SELECT * FROM `rooms`";
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
      <img class="img-responsive" src="./img/<?php echo $room_image; ?>" alt=" hotel room image" style="max-width: 100%;height: 200px; width: 100%;">
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
         <!--  <div class="col-xs-6">
              <a href="#" class="btn btn-primary btn-block">Read More...</a>
          </div> -->
          <div class="col-xs-12">
            <p class="text-right"><a href="admin.php?action=edit_room&id=<?php echo $room_id;?>" class="btn btn-primary btn-block">Edit Room</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>