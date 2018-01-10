<?php  
$message = $image_err = $room_name_err = $room_price_err = $room_description_err = "";
$error = false;

if(isset($_POST['add_room'])){

	$name = $_FILES["image"]["name"];
	$room_image_tmp = $_FILES["image"]["tmp_name"];

	switch($_FILES['image']['type'])
  {
    case 'image/jpeg':
    case 'image/jpg':
    	$ext = 'jpg'; 
    	break;
    case 'image/gif': 
    	$ext = 'gif'; 
    	break;
    case 'image/png': 
    	$ext = 'png'; 
    	break;
    case 'image/tiff': 
    	$ext = 'tif'; 
    	break;
    case 'image/webp': 
    	$ext = 'webp'; 
    	break;
    default: 
    	$ext = ''; 
    	break;
  }

  if(empty($_POST['room_name'])){
  	$error = true;
  	$room_name_err = "Room name is empty";
  }else{
  	$room_name = $_POST['room_name'];
  }
	
	if(empty($_POST['room_price'])){
		$error = true;
  	$room_price_err = "Room price is empty";
  }else{
  	$room_price = $_POST['room_price'];
  }

  if(empty($_POST['room_description'])){
  	$error = true;
  	$room_description_err = "Room description is empty";
  }else{
  	$room_description = $_POST['room_description'];
  }

  if(!$ext){
  	$image_err = "'$name' is not an accepted image file";
  }

  if(!$error && $ext){

  	$string = "abcdefghij1234567890";
  	$rand_str = str_shuffle($string);
  	$room_image = $rand_str.".".$ext;

  	$sql = "INSERT INTO `rooms`(`room_image`, `room_name`, `room_price`, `room_description`) VALUES('$room_image','$room_name','$room_price','$room_description')";
		$added = mysqli_query($dbc, $sql);

		if($added && move_uploaded_file($room_image_tmp, "img/$room_image")){
			$message = "Room added sucessfully!";
		}else{
			$message = "Error adding new room.";
		}
  }
	
}

?>
<div class="row">
  <div class="col-md-12">
    <div class="btn-group btn-group-justified">
    	<a href="admin.php?action=rooms" class="btn btn-primary">Available room</a>
      <a href="admin.php?action=add_room" class="btn btn-primary active">Add room</a>
      <a href="admin.php?action=view_booked_rooms" class="btn btn-primary">Booked rooms</a>
      <a href="admin.php?action=view_all_rooms" class="btn btn-primary">All rooms</a>
    </div>
  </div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<header class="text-center well well-sm">
			<h1>Add new room</h1>
		</header>
	</div>
</div>
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
		<div class="well">
			<form class="form-horizontal" role="form" action="admin.php?action=add_room" method="post" enctype="multipart/form-data">
				<div class="form-group">
				    <label class="control-label col-sm-3" for="image">Room Image: </label>
				    <div class="col-sm-9">
				      	<input type="file" class="form-control" name="image" id="image" autofocus required>
				      	<span class="text-danger"><?php if($image_err != "") echo $image_err; ?></span>
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-3" for="room_name">Room Name: </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="room_name" name="room_name" placeholder="eg. room 5a" required>
				     	<span class="text-danger"><?php if($room_name_err != "") echo $room_name_err; ?></span>
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-3" for="room_price">Room Price: </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" name="room_price" id="room_price" placeholder="room price" required>
				      <span class="text-danger"><?php if($room_price_err != "") echo $room_price_err; ?></span>
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-3" for="room_description">Room Description: </label>
				    <div class="col-sm-9">
				      <textarea rows="4" class="admin form-control input-lg" name="room_description" id="room_description" placeholder="Enter room description..." style="max-width: 100%;" required></textarea>
				      <span class="text-danger"><?php if($room_description_err != "") echo $room_description_err; ?></span>
				    </div>
				</div>  
				<div class="form-group"> 
				    <div class="col-sm-12">
				      <button type="submit" class="btn btn-primary btn-lg btn-block" name="add_room">Add room</button>
				    </div>
				</div>
			</form>
		</div>
	</div>
</div>