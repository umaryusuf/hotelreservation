<div class="row">	
	<div class="col-md-8 col-md-offset-2">
		<div class="row">
			<div class="col-md-4">
				<img class="img-responsive" style="height: 200px" src="assets/img/profiles/<?php echo $data['picture']; ?>" alt="<?php echo $data['firstname'].' '.$data['lastname']; ?>" >
			</div>
			<div class="col-md-8">
				<h1><?php echo $data['username']; ?></h1>
				<br>
				<div>
					<p><a href="dashboard.php?action=change_profile_picture">Change profile picture</a></p>
					<p><a href="dashboard.php?action=change_profile">Change Profile</a></p>
					<p><a href="dashboard.php?action=change_password">Change Password</a></p>
					<p><a href="dashboard.php?action=view_booking">View Booking</a></p>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<td>First Name:</td>
					<td><?php echo ucfirst($data['firstname']); ?></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><?php echo ucfirst($data['lastname']); ?></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><?php echo $data['phone']; ?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo $data['email']; ?></td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td><?php echo ucfirst($data['gender']); ?></td>
				</tr>
				<tr>
					<td>City:</td>
					<td><?php echo ucfirst($data['city']); ?></td>
				</tr>
				<tr>
					<td>State:</td>
					<td><?php echo ucfirst($data['state']); ?></td>
				</tr>
				<tr>
					<td>Country:</td>
					<td><?php echo ucfirst($data['country']); ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>