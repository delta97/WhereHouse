<?php

	require "serverconnect.php";
	$connection = serverConnect();

	$user_first_name = $_POST["user-first-name"];
	$user_last_name = $_POST["user-last-name"];
	$user_email = $_POST["user-email"];
	$user_phone_number = $_POST["user-phone"];
	$user_password = $_POST["user-password"];
	$user_dob = $_POST["user-dob"];
	$user_street_1 = $_POST["user-street-1"];
	$user_street_2 = $_POST["user-street-2"];
	$user_city = $_POST["user-city"];
	$user_state = $_POST["user-state"];
	$user_zipcode = $_POST["user-zip"];
	$user_bank_account = $_POST["user-bank-account"];
	$user_bank_routing = $_POST["user-routing"];




	$query = "INSERT INTO User (first_name, last_name, address_1, address_2, city, state, zipcode, DOB, phone_num, email, password, routing_num, bank_acc) VALUES ('$user_first_name', '$user_last_name', '$user_street_1', '$user_street_2', '$user_city', '$user_state', '$user_zipcode', '$user_dob', '$user_phone_number', '$user_email', '$user_password', '$user_bank_routing', '$user_bank_account')";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		$query = "SELECT user_id FROM User WHERE email = '$user_email'";
		$result2 = mysqli_query($connection, $query);
		$assoc_array = mysqli_fetch_assoc($result2);
		$num_users = sizeof($assoc_array);

		if($num_users > 0){
			$error = 2; //this means that the user's email is already in the database
		}
		else {
			$error = 1; //then we don't know what the problem is since their email wasn't in the database but we had trouble submitting it
		}
		
	}
	else {
		$error = 0;
		$_SESSION['user_first_name'] = $user_first_name;
		$_SESSION['user_last_name'] = $user_last_name;
		$query = "SELECT user_id FROM User WHERE email = '$user_email'";
		$result = mysqli_query($connection, $query);
		if(!$result) { //at this point, since we know that the initial query went through, if !$result2, we don't know what went wrong and they should try again
			$error = 1;
		}
		$assoc_array = mysqli_fetch_assoc($result);

		$user_id = $assoc_array['user_id'];
		$_SESSION['user_id'] = $user_id; 

		$query = "INSERT INTO Owner (id, Routing_Num, Account_Num) VALUES ($user_id, $user_bank_routing, $user_bank_account)";
		$result = mysqli_query($connection, $query);
		if(!$result) {
			$error = 1;
		}
	}

	mysqli_close($connection);

	$return = json_encode(array('error' => $error));

	echo($return);

	
?>