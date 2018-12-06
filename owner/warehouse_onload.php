<?php

	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	$connection = serverConnect();

	$user_id = $_POST['user_id'];

	$query = "SELECT * FROM Warehouse WHERE owner_id = $user_id";
	$result = mysqli_query($connection, $query);
	$warehouse_info = array();
	while($row = mysqli_fetch_assoc($result)){
		$warehouse_info[] = $row;
	}

	$size = sizeof($warehouse_info);

	$id = $warehouse_info['warehouse_id'];
	$address_1 = $warehouse_info['address_1'];
	$address_2 = $warehouse_info['address_2'];
	$city = $warehouse_info['city'];
	$state = $warehouse_info['state'];
	$zipcode = $warehouse_info['zipcode'];
	$price_per_skid = $warehouse_info['price_per_skid'];
	$capacity = $warehouse_info['capacity'];
	$size = $warehouse_info['size'];
	$storage_pref = $warehouse_info['storage_pref'];
	$lowest_temp = $warehouse_info['lowest_temp'];
	$highest_temp = $warehouse_info['highest_temp'];
	$owner_id = $warehouse_info['owner_id'];
	$rating = $warehouse_info['weighted_average_rating'];
	$number_of_ratings = $warehouse_info['number_of_ratings'];

	$return = json_encode(array("id" => $id, "address_1" => $address_1, "address_2" => $address_2, "city" => $city, "state" = > $state, "zipcode" => $zipcode, "price_per_skid" => $price_per_skid, "capacity" => $capacity, "size" => $size, "storage_pref" => $storage_pref, "lowest_temp" => $lowest_temp, "highest_temp" => $highest_temp, "owner_id" => $owner_id, "rating" => $rating, "num_ratings" => $number_of_ratings));
	
	echo($return);

	mysqli_close($connection);

?>
