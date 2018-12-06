<?php
	require "serverconnect.php";

	$connection = serverConnect();

	$user_id = $_POST['user_id'];
	$user_first_name = $_POST['user_first_name'];
	$user_last_name = $_POST['user_last_name'];
	$user_address_1 = $_POST['user_address_1'];
	$user_address_2 = $_POST['user_address_2'];
	$user_city = $_POST['user_city'];
	$user_state = $_POST['user_state'];
	$user_zip = $_POST['user_zipcode'];
	$user_phone = $_POST['user_phone_num'];


	$query = "UPDATE User SET first_name = '$user_first_name', last_name = '$user_last_name',  address_1 = '$user_address_1', address_2 '$user_address_2', city = '$user_city', state = '$user_state', zipcode = '$user_zip', phone_num = '$user_phone' WHERE id = $user_id";


	$result = mysqli_query($connection, $query);

	if(!$result) {
		echo(1);
	}
	else {
		echo(0);
	}

	mysqli_close($connection);

?>

