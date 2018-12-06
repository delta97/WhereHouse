<?php

	require "serverconnect.php";
	$connection = serverConnect();

	$user_first_name = $_POST["user_first_name"];
	$user_last_name = $_POST["user_last_name"];
	$user_email = $_POST["user_email"];
	$user_phone_number = $_POST["user_phone"];
	$user_password = $_POST["user_password"];
	$user_dob = $_POST["user_dob"];
	$user_street_1 = $_POST["user_street_1"];
	$user_street_2 = $_POST["user_street_2"];
	$user_city = $_POST["user_city"];
	$user_state = $_POST["user_state"];
	$user_zipcode = $_POST["user_zipcode"];
	$user_bank_account = $_POST["user_bank_account"];
	$user_bank_routing = $_POST["user_bank_routing"];




	$query = "INSERT INTO User (first_name, last_name, address_1, address_2, city, state, zipcode, DOB, phone_num, email, password) VALUES ('$user_first_name', '$user_last_name', '$user_street_1', '$user_street_2', '$user_city', '$user_state', $user_zipcode, $user_dob, $user_phone_number, '$user_email', '$user_password')";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		$query = "SELECT id FROM User WHERE email = '$user_email'";
		$result2 = mysqli_query($connection, $query);
		
		if(!$result2){
			$error = 2; //this means that the user's email is already in the database
		}
		else {
			$error = 1; //then we don't know what the problem is since their email wasn't in the database but we had trouble submitting it
		}
		
	}
	else {
		$error = 0;
		
		$query = "SELECT id FROM User WHERE email = '$user_email' AND phone_num = $user_phone_number";
		$result = mysqli_query($connection, $query);
		if(!$result) { //at this point, since we know that the initial query went through, if !$result2, we don't know what went wrong and they should try again
			$error = 1;
		}
		$assoc_array = mysqli_fetch_assoc($result);

		$user_id = $assoc_array['id'];
	

		$query = "INSERT INTO Owner (owner_id, routing_num, bank_acc) VALUES ($user_id, $user_bank_routing, $user_bank_account)";
		$result = mysqli_query($connection, $query);
		if(!$result) {
			$error = 1;
		}
	}

	

	$return = json_encode(array('error' => $error, 'user_first_name' => $user_first_name, 'user_last_name' => $user_last_name));

	echo($return);
	mysqli_close($connection);
	
?>