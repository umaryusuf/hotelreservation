<div class="row">
	<div class="col-md-12">
		<header class="well well-sm">
			<h3 class="text-center">
				View Message
			</h3>
		</header>
	</div>
</div>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<?php
			$user_id = $_GET["user_id"];

			if (isset($_POST["reply"])) {
				if(!empty($_POST["reply_msg"])){
					$reply_msg = $_POST["reply_msg"];

					$sql = mysqli_query($dbc, "INSERT INTO users_msg(sender, user_id, content) VALUES('admin', '$user_id', '$reply_msg')");
					if ($sql) {
						echo "
						<div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong>Sucess: message sent sucessfully</strong>
						</div>";
					} else {
						echo "
						<div class='alert alert-danger'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong>Oops: Error replying message.</strong>
						</div>";
					}
				}else{
					echo "
						<div class='alert alert-danger'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong>Oops: message is empty.</strong>
						</div>";
				}
				

			}
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
	<?php  

		$read = $_GET["id"];

		$q = mysqli_query($dbc, "UPDATE admin_messages SET viewed='1' WHERE message_id='$read'");
		if($q){
			$q2 = mysqli_query($dbc, "SELECT * FROM admin_messages WHERE message_id='$read'");
			while ($row = mysqli_fetch_array($q2)) {
		?>
			<div class="panel panel-default">
				<div class="panel-heading color">
					Messages:
				</div>
		    <div class="panel-body" style="height: 300px; overflow-y: scroll; ">
					<div class="well">
						<h5>
							<?php  
								$q = mysqli_query($dbc, "SELECT firstname, lastname FROM `users` WHERE id=".$row["user_id"]);
								while ($data = mysqli_fetch_array($q)) {
									echo "<span class='label label-default'>".$data["firstname"] . " ". $data["lastname"]. "</span> says: ";
								}
							?>
						</h5>
						<?php echo $row["content"]; ?>
					</div>
					<hr>
					<?php  
						$sql = mysqli_query($dbc, "SELECT * FROM users_msg WHERE user_id='$user_id'");
						while($r = mysqli_fetch_array($sql)){
					?>
					<div class="well well-sm color">
						<h6><span class="label label-default">Admin</span> says:</h6>
						<p><?php echo $r["content"];  ?></p>	
					</div>
					<?php } ?>	
		    </div>
		    <div class="panel-footer">
		    	<form action="<?php $_SERVER['PHP_SELF'] ?>" role="form" method="POST">
						<div class="form-group">
							<textarea name="reply_msg" id="reply_msg" class="form-control" placeholder="reply message" rows="4"></textarea>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<button type="submit" name="reply" class="btn btn-primary btn-sm">Send Message</button>
							</div>
							<div class="col-xs-4">
								<a href="admin.php?action=read_messages" class="btn btn-primary btn-sm">Cancel</a>
							</div>
						</div>	
					</form>
		    	
		    </div>
		  </div>
		<?php
			}
		}else{
			echo "<script>alert('Error opening message')</script>";
		}

	?>
	</div>
</div>
