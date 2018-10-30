<?php
	$servername = "g1040924";
	$username = "g1040924";
	$password = "*password*";

	//create connection
	$connection = mysqli_connect($servername, $username, $password);

	//check connection
	if (!$connection) {
		die("The server connection failed: " . mysqli_connect_error());
	}
	//Get form data and save into php variables
	$first_name = $_POST['user-first-name'];
	$last_name = $_POST['user-last-name'];
	$email = $_POST['user-email'];
	$phone = $_POST['user-phone'];
	$dob = $_POST['user-dob'];
	$street1 = $_POST['user-street-1'];
	$street2 = $_POST['user-street-2'];
	//$address
	$city = $_POST['user-city'];
	$state = $_POST['user-state'];
	$user-type = $_POST['form-type'] //where 1 is lessee
	//Insert form data into the server
	if ($user-type == 1) { //if the user form is a lessee
		$query = "INSERT INTO  User (User_type, First_name, Last_name, Address, DOB, Phone_num, Email) VALUES (".$user-type.",'".$first_name."', '".$last_name."','".$address."', ".$dob.",".$phone.", '".$email."')";
		
	}
	else {
		$query = 
	}
	

<?>