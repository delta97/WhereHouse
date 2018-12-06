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
	$cc_num = $_POST['cc_num'];
	$exp_month = $_POST['exp-month'];
	$exp_year = $_POST['exp-year'];
	$cvc = $_POST['CVC'];





	$query = "INSERT INTO User (first_name, last_name, address_1, address_2, city, state, zipcode, DOB, phone_num, email, password) 
				VALUES ('$user_first_name', '$user_last_name', '$user_street_1', '$user_street_2', '$user_city', '$user_state', '$user_zipcode', '$user_dob', '$user_phone_number', '$user_email', '$user_password')";

	$result = mysqli_query($connect, $query);
	if(!$result) {
		die('There was an error submitting the data into the User table.');
		mysqli_close($connect);
	}
	else {
		$assoc = array();
		$query1 = "SELECT id FROM User WHERE email = '".$user_email."'";
		$result1 = mysqli_query($connect, $query1);
		$assoc = mysqli_fetch_assoc($result1);
		$id = $assoc['id'];

		$query = "INSERT INTO Lessee (lessee_id, credit_card_num, expiration_month, expiration_year, CVC) VALUES ('$cc_num', '$exp_month', '$exp_year', '$cvc')";
		$result = mysqli_query($connect, $query);
		if(!$result){
			$error = "error with lessee";
		}

		$return = json_encode(array("error" => $error, "user_id" => $id, "first_name" => $user_first_name, "last_name" => $user_last_name));
		echo($return);
	
		mysqli_close($connect);
			
	}
?>