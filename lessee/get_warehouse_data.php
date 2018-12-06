<?php
	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}

$connection = serverConnect();


$warehouseID = $_POST['warehouse_id'];


$query = "SELECT * FROM Warehouse WHERE warehouse_id = $warehouseID";
$result = mysqli_query($connection, $query);
if($result){ 
	$assoc_array = mysqli_fetch_assoc($result);

	$address_line_1 = $assoc_array['address_1'];
	$address_line_2 = $assoc_array['address_2'];
	$city = $assoc_array['city'];
	$state = $assoc_array['state'];
	$zipcode = $assoc_array['zip'];
	$price_per_skid = $assoc_array['price_per_skid'];
	$capacity = $assoc_array['capacity'];
	$square_footage = $assoc_array['size'];
	$owner_id = $assoc_array['owner_id'];
	$storage_pref = $assoc_array['storage_pref'];
	echo (json_encode(array("address_line_1" => $address_line_1, "address_line_2" => $address_line_2, "city" => $city, "state" => $state, "zipcode" => $zipcode, "price_per_skid" => $price_per_skid, "capacity" => $capacity, "square_footage" => $square_footage, "owner_id" => $owner_id)));

}
else {
	$error = "There was a problem retrieving data for this warehouse.";
	echo" {'error': '".$error."'}";
}

mysqli_close($connection);
exit();
?>