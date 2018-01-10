<?php
$error = false;


if(isssey($_POST['payment'])){
	
	

	if(empty($_POST['user_id'])){
		$error = true;
		$user_id_err = "Invalid  user id";
	}else{
		$user_id = test_input($_POST['user_id']);
	}

	if(empty($_POST['room_id'])){
		$error = true;
		$room_id_err = "Room not selected";
	}else {
		$room_id = test_input($_POST['room_id']);
	}

	if(!$error){

	}


	function test_input()
}


?>