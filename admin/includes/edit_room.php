<?php 
$id = $_GET['id'];

if(isset($_POST["update"])){
	$name = $_FILES["image"]["name"];
	$room_image_tmp = $_FILES["image"]["tmp_name"];

	switch($_FILES['image']['type'])
  {
    case 'image/jpeg':
    case 'image/jpg':
    case 'image/pjpeg':
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


  	$sql = "INSERT INTO `rooms`(`room_image`='$room_image', `room_name`='$room_name', `room_price`='$room_price', `room_description`='$room_description') WHERE `room_id`='$id'";
		$added = mysqli_query($dbc, $sql);

		if($added && move_uploaded_file($room_image_tmp, "img/$room_image")){
			echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Message: Room Updated Sucessfully</strong>
					</div>";
		}else{
			echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Message: Error updating room.</strong>
					</div>";
		}
  }
}

?>
<br>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="well">
			<?php  
				$sql = "SELECT * FROM `rooms` WHERE `room_id`='$id'";

				$exec = mysqli_query($dbc, $sql);
				while($data = mysqli_fetch_array($exec)){
					$image = $data["room_image"];
					$name = $data["room_name"];
					$price = $data["room_price"];
					$desc = $data["room_description"];
			?>
			<h3>Edit Room Information</h3>
			<img src="img/<?php echo $image; ?>" alt="<?php echo $name; ?>" class="img-responsive" style="width:100%;height: 250px;">
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" role="form">
				<div class="form-group">
					<label for="room_image">Room Image:</label>
					<input type="file" name="room_image" class="form-control input-sm" value="<?php echo $image; ?>" placeholder="choose image">
				</div>
				<div class="form-group">
					<label for="room_name">Room Name:</label>
					<input type="text" class="form-control input-sm" name="room_name" id="room_name" placeholder="eg room 5a" value="<?php echo $name;?>" required>
				</div>
				<div class="form-group">
					<label for="room_price">Room Price:</label>
					<input type="text" class="form-control input-sm" name="room_price" id="room_price" placeholder="room price" value="<?php echo $price;?>" required>
				</div>
				<div class="form-group">
					<label for="room_description">Room Description:</label>
					<textarea rows="4" class="form-control" style="max-width: 100%;" name="room_description" id="room_description" placeholder="room description" required><?php echo $desc;?></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit" name="update">Update room information</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php } ?>