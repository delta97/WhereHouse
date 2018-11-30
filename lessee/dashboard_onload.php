<?php
	if(!function_exists(serverConnect)){
		require 'serverconnect.php';
	}
	$connection = serverConnect();

	$user_id = $_SESSION['user_id'];


	$query = "SELECT first_name, last_name, email, address_1, address_2, city, state, zipcode FROM User WHERE user_id = $user_id";
	$result = mysqli_query($connection, $query);
	$assoc_array = mysqli_fetch_assoc($result);

	$first_name = $assoc_array['first_name'];
	$last_name = $assoc_array['last_name'];
	$email = $assoc_array['email'];
	$address_1 = $assoc_array['address_1'];
	$address_2 = $assoc_array['address_2'];
	$city = $assoc_array['city'];
	$state = $assoc_array['state'];
	$zipcode = $assoc_array['zipcode'];

	$return = json_encode(array('first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'address_1' => $address_1, 'address_2' => $address_2, 'city' => $city, 'state' => $state, 'zipcode' => $zipcode));

	echo($return);
	mysqli_close($connection);

?>
