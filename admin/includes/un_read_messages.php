<div class="row">
	<div class="col-md-12">
		<div class="btn-group btn-group-justified">
		  <a href="admin.php?action=messages" class="btn btn-primary">All Messages
				<?php  
          $query = mysqli_query($dbc, "SELECT COUNT(`message_id`) FROM `admin_messages`");
          $data = mysqli_fetch_array($query);
          echo "<span class='badge'>" .$data[0] ."</span>";
        ?>
		  </a>
		  <a href="admin.php?action=read_messages" class="btn btn-primary">Viewed messages
				<?php  
          $query = mysqli_query($dbc, "SELECT COUNT(`message_id`) FROM `admin_messages` WHERE viewed='1'");
          $data6 = mysqli_fetch_array($query);
          echo "<span class='badge'>" .$data6[0] ."</span>";
        ?>
		  </a>
		  <a href="admin.php?action=un_read_messages" class="btn btn-primary active">Un-read Messages <?php  
          $query = mysqli_query($dbc, "SELECT  COUNT(`message_id`) FROM `admin_messages` WHERE viewed='0'");
          $data4 = mysqli_fetch_array($query);
          echo "<span class='badge'>" .$data4[0] ."</span>";

        ?></a>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<header class="well well-sm">
			<h3 class="text-center">Un-read Messages</h3>
		</header>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<ul>
			<?php  
				$query = mysqli_query($dbc, "SELECT * FROM admin_messages WHERE viewed='0'");
				while ($row = mysqli_fetch_array($query)) {

				?>
			<li>
				<div class="well well-sm bg-info">
					You have 1 new message from  
				<?php  
					$q = mysqli_query($dbc, "SELECT firstname, lastname FROM `users` WHERE id=".$row["user_id"]);
					while ($data = mysqli_fetch_array($q)) {
						echo "<span class='label label-primary spn'>".$data["firstname"] . " ". $data["lastname"] ."</span>";
					}
				?> 
				<form action="admin.php?action=view_new_msg&id=<?php echo $row['message_id']; ?>&user_id=<?php echo $row['user_id']; ?>" method="POST" class="form-inline">
					<input type="hidden" name="message_id" value="<?php echo $row['message_id']; ?>">
					<button type="submit" name="read" class="btn btn-sm btn-primary">View Message</button>
				</form>
				</div>
			</li>
			<?php } ?>
		</ul>
	</div>
