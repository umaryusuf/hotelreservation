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
		  <a href="admin.php?action=read_messages" class="btn btn-primary active">Viewed messages
				<?php  
          $query = mysqli_query($dbc, "SELECT COUNT(`message_id`) FROM `admin_messages` WHERE viewed='1'");
          $data6 = mysqli_fetch_array($query);
          echo "<span class='badge'>" .$data6[0] ."</span>";
        ?>
		  </a>
		  <a href="admin.php?action=un_read_messages" class="btn btn-primary">Un-read Messages 
		  <?php  
        $query = mysqli_query($dbc, "SELECT  COUNT(`message_id`) FROM `admin_messages` WHERE viewed='0'");
        $data4 = mysqli_fetch_array($query);
        echo "<span class='badge'>" .$data4[0] ."</span>";

      ?>
              	
      </a>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<header class="well well-sm">
			<h3 class="text-center">Viewed Messages</h3>
		</header>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr class="active">
					<th>Full Name</th>
					<th>Message</th>
					<th>Reply</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				$query = mysqli_query($dbc, "SELECT * FROM admin_messages WHERE viewed='1'");
				while ($row = mysqli_fetch_array($query)) {
					$user_id = $row["user_id"];
				?>
				<tr>
					<td>
						<?php  
							$q = mysqli_query($dbc, "SELECT firstname, lastname FROM `users` WHERE id=".$row["user_id"]);
							while ($data = mysqli_fetch_array($q)) {
								echo $data["firstname"] . " ". $data["lastname"];
							}
						?>
					</td>
					<td><?php echo $row["content"]; ?></td>
					<td><a href="admin.php?action=view_new_msg&id=<?php echo $row['message_id']; ?>&user_id=<?php echo $user_id ?>" class="btn btn-primary btn-sm">Reply</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>