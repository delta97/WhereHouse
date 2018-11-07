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
	//$bank_account_num = $
	//$bank_routing_num = $


	$query = "INSERT INTO User (First_name, Last_name, DOB, Phone_num, User_type, Email, password) VALUES ('$user_first_name', '$user_last_name', '$user_dob', '$user_phone_number', 0, '$user_email', '$user_password')";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		echo "There was an error inserting the data into the database. Please try again.";
		die;
	}
	mysqli_close($connection);
	
	header('Location: http://web.ics.purdue.edu/~g1090429/home/registration/registration_success.php', true);
	exit;
?>