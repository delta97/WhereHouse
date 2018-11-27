<?php
	require "serverconnect.php";
	$connect = serverConnect();

	$user_first_name = $_POST['user-first-name'];
	$user_last_name = $_POST['user-last-name'];
	$user_email = $_POST['user-email'];
	$user_phone_number = $_POST['user-phone'];
	$user_password = $_POST['user-password'];
	$user_dob = $_POST['user-dob'];
	$user_street_1 = $_POST['user-street-1'];
	$user_street_2 = $_POST['user-street-2'];
	$user_city = $_POST['user-city'];
	$user_state = $_POST['user-state'];
	$user_zipcode = $_POST['user-zip'];
	$user_bank_account = $_POST['user-bank-account'];
	$user_bank_routing = $_POST['user-routing'];




	$query = "INSERT INTO User (first_name, last_name, address_1, address_2, city, state, zipcode, DOB, phone_num, user_type, email, password, routing_num, bank_acc) 
				VALUES ('$user_first_name', '$user_last_name', '$user_street_1', '$user_street_2', '$user_city', '$user_state', '$user_zipcode', '$user_dob', '$user_phone_number', 0, '$user_email', '$user_password', '$user_bank_routing', '$user_bank_account');";

	$result = mysqli_query($connect, $query);
	if(!$result) {
		die('There was an error submitting the data to the server.');
		mysqli_close($connect);
	}
	else {
		mysqli_close($connect);
		
		
	}
?>