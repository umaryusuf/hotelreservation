<div class="row">
	<div class="col-md-12">
		<div class="btn-group btn-group-justified">
		  <a href="admin.php?action=employees" class="btn btn-primary active">View all employees</a>
		  <a href="admin.php?action=add_employee" class="btn btn-primary">Add employee</a>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<header class="text-center well well-sm">
			<h1>View all employees</h1>
		</header>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr class="active">
					<th>Full Name:</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Position</th>
					<th>Gender</th>
					<th>Bank Name</th>
					<th>Acct Name</th>
					<th>Acct Num</th>
					<th>Address</th>
					<th>Del</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					$sql = "SELECT * FROM `employee`";
					$r_sql = mysqli_query($dbc, $sql); 

					while($row = mysqli_fetch_array($r_sql)){
						$employee_id = $row['employee_id'];
						$fullname = $row['fullname'];
						$email = $row['email'];
						$phone = $row['phone'];
						$position = $row['position'];
						$gender = $row['gender'];
						$bank_name = $row['bank_name'];
						$account_name = $row['account_name'];
						$account_number = $row['account_number'];
						$address = $row['address'];
				?>
				<tr>
					<td><?php echo ucfirst($fullname); ?></td>
					<td><?php echo $email; ?></td>
					<td><?php echo $phone; ?></td>
					<td><?php echo $position; ?></td>
					<td><?php echo ucfirst($gender); ?></td>
					<td><?php echo ucfirst($bank_name); ?></td>
					<td><?php echo ucfirst($account_name); ?></td>
					<td><?php echo ucfirst($account_number); ?></td>
					<td><?php echo ucfirst($address); ?></td>
					<td><a href="delete.php?del=<?php echo $employee_id; ?>"><span class="text-danger fa fa-trash"></span></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
