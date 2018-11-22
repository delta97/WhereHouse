<?php
	if(session_status = PHP_SESSION_NONE) {
		session_start();
	}
	require "serverconnect.php";
	$connection = serverConnect();


	$query = "SELECT first_name, last_name FROM User WHERE email = ".$_SESSION['user-email'].";";

	$result = mysqli_query($connection, $query);

	$associative_array = mysqli_fetch_assoc($result);

	$_SESSION['user_first_name'] = $associative_array['first_name'];
	$_SESSION['user_last_name'] = $associative_array['last_name'];
	$array = array("user_first_name" => $associative_array['first_name'], "user_last_name" => $associative_array['last_name']);
	echo($array);
	mysqli_close($connection);
?>