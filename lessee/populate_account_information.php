<?php
	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	$connection = serverConnect();

	$user_id = 1;

	$query = "SELECT * FROM User WHERE user_id = $user_id";
	$result = mysqli_query($connection, $query);

	if($result){
		$assoc_array = mysqli_fetch_assoc($result);

		//general information
		$first_name = $assoc_array['first_name'];
		$last_name = $assoc_array['last_name'];
		$address_1 = $assoc_array['address_1'];
		$address_2 = $assoc_array['address_2'];
		$city = $assoc_array['city'];
		$state = $assoc_array['state'];
		$zipcode = $assoc_array['zipcode'];

		
		$query = "SELECT * FROM Lessee WHERE id = $user_id";
		$result = mysqli_query($connection, $query);
		if($result){
			$assoc_array = mysqli_fetch_assoc($result);
			//financial information
			$bank_account = $assoc_array['bank_account'];
			$bank_routing = $assoc_array['bank_routing'];
		}	
		else {
			$error_banking = true;
		}
	}
	else {
		$error_general = true;
	}

	$return = json_encode(array('error_general' => $error_general, 'error_banking' => $error_banking, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'address_1' => $address_1, 'address_2' => $address_2, 'city' => $city, 'state' => $state, 'zipcode' => $zipcode, 'bank_account' => $bank_account, 'bank_routing' => $bank_routing));

	echo($return);
	mysqli_close($connection);


?>