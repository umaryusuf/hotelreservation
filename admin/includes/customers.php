<div class="row">
	<div class="col-md-12">
		<div class="btn-group btn-group-justified">
		  <a href="admin.php?action=customers" class="btn btn-primary active">View all customers</a>
		  <a href="admin.php?action=view_booked_customers" class="btn btn-primary">View Booked Customers</a>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<header class="text-center">
			<div class="well well-sm">
				<h1>All Customers</h1>
			</div>
		</header>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<table class="table">
			<thead>
				<tr class="active">
					<th>First Name:</th>
					<th>Last Name</th>
					<th>Username</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Gender</th>
					<th>City</th>
					<th>State</th>
					<th>Country</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					$sql = "SELECT * FROM `users`";
					$r_sql = mysqli_query($dbc, $sql); 

					while($row = mysqli_fetch_array($r_sql)){
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$username = $row['username'];
						$phone = $row['phone'];
						$email = $row['email'];
						$gender = $row['gender'];
						$city = $row['city'];
						$state = $row['state'];
						$country = $row['country'];
				?>
				<tr>
					<td><?php echo ucfirst($firstname); ?></td>
					<td><?php echo ucfirst($lastname); ?></td>
					<td><?php echo $username; ?></td>
					<td><?php echo $phone; ?></td>
					<td><?php echo $email; ?></td>
					<td><?php echo ucfirst($gender); ?></td>
					<td><?php echo ucfirst($city); ?></td>
					<td><?php echo ucfirst($state); ?></td>
					<td><?php echo ucfirst($country); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
