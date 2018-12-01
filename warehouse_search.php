<?php
	//https://www.geodatasource.com/developers/php
	function getDistance($lat1, $long1, $lat2, $long2, $unit){
		if (($lat1 == $lat2) && ($long1 == $long2)) {
			return 0;
		}
		else {
			$theta = $long1 - $long2;
			$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$miles = $dist * 60 * 1.1515;
			$unit = strtoupper($unit);

			if($unit == "K") {
				return ($miles * 1.609344);
			}
			else if($unit == "N") {
				return ($miles * 0.8684);
			}
			else {
				return $miles;
			}
		}
	}






	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	$connection = serverConnect();

	$search_query = $_POST['search_query'];

	//debugging*****************
	$search_query = 92024;
	//**************************

	$search_lat_long_query = "SELECT * FROM zipcode_lat_long WHERE zipcode = $search_query";
	$search_lat_long_result = mysqli_query($connection, $search_lat_long_query);
	$search_lat_long_assoc = mysqli_fetch_assoc($search_lat_long_result);

	//latitude and longitude of the search zipcode
	$search_lat = $search_lat_long_assoc['latitude'];
	$search_long = $search_lat_long_assoc['longitude'];


	//getting the table of zipcodes and latitudes and longitudes
	$query_ziplatlong = "SELECT * FROM zipcode_lat_long";
	$result_ziplatlong = mysqli_query($connection, $query_ziplatlong);
	$ziplatlong_assoc = array();
	//fetches the entire zipcode_lat_long table as an associative array
	while($line = mysqli_fetch_assoc($result_ziplatlong)){
		$ziplatlong_assoc[] = $line;
	}


	$query_id = "SELECT id FROM Warehouse ORDER BY id DESC";
	$query_zip = "SELECT zip FROM Warehouse ORDER BY id DESC";
	$query_rating = "SELECT Avg_rating FROM Warehouse ORDER BY id DESC";

	$id_result = mysqli_query($connection, $query_id);
	$zip_result = mysqli_query($connection, $query_zip);
	$rating_result = mysqli_query($connection, $query_rating);

	if($id_result){
		$id_numeric = mysqli_fetch_all($id_result, MYSQLI_NUM); //numeric array of warehouse IDs
	}
	else{
		$id_numeric_error = "There was an error with generating the numeric id array."; //return this
	}

	if($zip_result){
		$zip_numeric = mysqli_fetch_all($zip_result, MYSQLI_NUM);
	}
	else{
		$zip_numeric_error = "There was an error with generating the numeric zipcode array."; //return this
	}

	if($rating_result){
		$rating_numeric = mysqli_fetch_all($rating_result, MYSQLI_NUM);
	}
	else{
		$rating_numeric_error = "There was an error with generating the numeric rating array."; //return this
	}

	$warehouse_row_size = sizeof($id_numeric);


	$warehouse_info_matrix = array("id" => $id_numeric, "zip" => $zip_numeric, "rating" => $rating_numeric);
	for($x=0; $x < $warehouse_matrix_size + 1; $x++){
		$zipcode_compare = $warehouse_info_matrix["zip"][$x]; //numeric array of all of the zipcodes from warehouses in the database
		$lat_compare = $ziplatlong_assoc['latitude'][$zipcode_compare]; //latitude for each of the warehouses in the database 
		$long_compare = $ziplatlong_assoc['longitude'][$zipcode_compare]; //longitude for each of the warehouses in the database

	}
		
	




	foreach($warehouse_other_array_zipcodes as $zip){
		$latitude_longitude_query = "SELECT * FROM zipcode_lat_long WHERE zipcode = $zip";
		$lat_long_result = mysqli_query($connection, $latitude_longitude_query);
		$assoc_lat_long = mysqli_fetch_assoc($lat_long_result);
		$latitude = $assoc_lat_long['latitude'];
		$longitude = $assoc_lat_long['longitude'];

		$distance_sm = getDistance($search_lat, $latitude, $search_long, $longitude, "M");
		$distance_km = getDistance($search_lat, $latitude, $search_long, $longitude, "K");
		$distance_nm = getDistance($search_lat, $latitude, $search_long, $longitude, "N");
		$distances[] = $distance_sm;
	}

	mysqli_close($connection);

?>