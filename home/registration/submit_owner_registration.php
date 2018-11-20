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




	$query = "INSERT INTO User (first_name, last_name, address_1, address_2, city, state, zipcode, DOB, phone_num, user_type, email, password, routing_num, bank_acc) VALUES ('$user_first_name', '$user_last_name', '$user_street_1', '$user_street_2', '$user_city', '$user_state', '$user_zipcode', '$user_dob', '$user_phone_number', 1, '$user_email', '$user_password', '$user_bank_routing', '$user_bank_account');";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		$query = "SELECT email FROM User WHERE email = '".$user_email."';";
		$result2 = mysqli_query($connection, $query);
		if(result2){
			echo "There already exists a user with this email. Please register again with a different email";
		}
		else {
			echo "There was an error inserting the data into the database. Please try again.";
		}
		mysqli_close($connection);
		die;
	}
	mysqli_close($connection);
	session_start();
	$_SESSION['user_first_name'] = $user_first_name;
	$_SESSION['user_last_name'] = $user_last_name;
	header('Location: http://web.ics.purdue.edu/~g1090429/home/registration/registration_success.php', true);
	exit;
?>