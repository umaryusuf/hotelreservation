<?php
include_once '../connect.php';

$employee_id = $_POST["employee_id"];

$done = mysqli_query($dbc, "DELETE FROM employee WHERE employee_id='$employee_id'");

if ($done) {
	header("Location: admin.php?action=employees");
}else{
	echo "
	<div class='alert alert-danger'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<strong>Oops): Error adding new employee.</strong>
	</div>";
}
?>