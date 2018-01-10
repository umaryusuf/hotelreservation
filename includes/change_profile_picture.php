<?php  
$message = "";



if(isset($_POST['submit'])){
	$target_dir = "assets/img/profiles/";
	$target_file = $target_dir . basename($_FILES["picture"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["picture"]["tmp_name"]);
	    if($check !== false) {
	      $uploadOk = 1;
	    } else {
	      $message = "File is not an image.";
	      $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    $message = "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp") {
	    $message = "Sorry, only JPG, JPEG, PNG, webp & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk !== 0) {
	    $photo_name = $_FILES["picture"]["name"];
		$update = mysqli_query($dbc, "UPDATE `users` SET `picture`='$photo_name' WHERE `id`='$user_id'");
	    if ($update && move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
	      $message = "Image has been uploaded sucessfully.";
	    } else {
	      $message = "Sorry, there was an error uploading your file.";
    	}
	} 
}
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<?php  

		if($message != ''){
			echo "
				<div class='alert alert-info'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Message: </strong>".$message."
				</div>";
		}

		?>
		<h4>Upload new profile picture</h4>
		<div>
			<img class="img-responsive" style="height: 200px" src="assets/img/profiles/<?php echo $data['picture']; ?>" alt="<?php echo $data['firstname'].' '.$data['lastname']; ?>">
		</div>
		<br>
		<form action="dashboard.php?action=change_profile_picture" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xs-6">
					<input type="file" name="picture" class="form-control" placeholder="choose" required>
				</div>
				<div class="col-xs-2">
					<button type="submit" class="btn btn-default" name="submit">Upload</button>
				</div>
			</div>
			
		</form>
	</div>
</div>