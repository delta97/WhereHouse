<?php
	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	$connection = serverConnect();

	$user_id = $_POST['user_id'];

	$query = "SELECT * FROM User WHERE id = $user_id";
	$result = mysqli_query($connection, $query);

	
	if($result){
		$error_general = 0;
		$assoc_array = mysqli_fetch_assoc($result);

		//general information
		$first_name = $assoc_array['first_name'];
		$last_name = $assoc_array['last_name'];
		$address_1 = $assoc_array['address_1'];
		$address_2 = $assoc_array['address_2'];
		$city = $assoc_array['city'];
		$state = $assoc_array['state'];
		$zipcode = $assoc_array['zipcode'];
		$phone_number = $assoc_array['phone_num'];

		
		$query = "SELECT * FROM Lessee WHERE lessee_id = $user_id";
		$result = mysqli_query($connection, $query);
		if($result){
			$error_banking = 0;
			$assoc_array = mysqli_fetch_assoc($result);
			//financial information
			$credit_card_num = $assoc_array['credit_card_num'];
			$expiration_month = $assoc_array['expiration_month'];
			$expiration_year = $assoc_array['expiration_year'];
			$CVC = $assoc_array['CVC'];

		}	
		else {
			$error_banking = 1;
		}
	}
	else {
		$error_general = 1;
	}

	$return = json_encode(array('error_general' => $error_general, 'error_banking' => $error_banking, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'address_1' => $address_1, 'address_2' => $address_2, 'city' => $city, 'state' => $state, 'zipcode' => $zipcode, 'credit_card_num' => $credit_card_num, 'expiration_month' => $expiration_month, 'expiration_year' => $expiration_year, 'cvc' => $CVC, 'user_phone' => $phone_number));

	echo($return);
	mysqli_close($connection);


?>