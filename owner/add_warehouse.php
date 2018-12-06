<?php
	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	$connection = serverConnect();

	$user_id = $_POST['user_id'];
	$user_id = 13;
	$price_per_skid = $_POST['price_per_skid'];
	$name = $_POST['name'];
	$size = $_POST['size'];
	$capacity = $_POST['capacity'];
	$temp_low = $_POST['temp_low'];
	$temp_high = $_POST['temp_high'];
	$address_1 = $_POST['address_1'];
	$address_2 = $_POST['address_2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];

	//getting the storage_pref
	if($low_temp >= 0 && $low_temp <= 34){
		$storage_pref = 'Frozen';
	}
	elseif($low_temp > 34 && $low_temp <= 55){
		$storage_pref = 'Cooler';
	}
	elseif($low_temp > 55 && $low_temp <= 75){
		$storage_pref = 'Climate Control';
	}
	elseif($low_temp > 75){
		$storage_pref = 'Dry';
	}
	

	$query = "INSERT INTO Warehouse (address_1, address_2, city, state, zipcode, price_per_skid, capacity, size, storage_pref, lowest_temp, highest_temp, owner_id,name) VALUES ('".$address_1."', '".$address_2."', '".$city."', '".$state."', ".$zipcode.", ".$price_per_skid.", ".$capacity.", ".$size.", '".$storage_pref."', ".$temp_low.", ".$temp_high.", ".$user_id.", '".$name."')";
	$result = mysqli_query($connection, $query);
	if(!$result){
		$error = 1; //error
	}
	else{
		$error = 0; //success
	}

	echo(json_encode(array("error" => $error)));
	mysqli_close($connection);

?>