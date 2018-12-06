<?php 
	function getDatesFromRange($start, $end, $format = 'Y-m-d'){
	    $array = array();
	    $interval = new DateInterval('P1D');

	    $realEnd = new DateTime($end);
	    $realEnd->add($interval);

	    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

	    foreach($period as $date) { 
	        $array[] = $date->format($format); 
	    }

	    return $array;
	}
	
	function array_column(array $input, $columnKey, $indexKey = null) {
	        $array = array();
	        foreach ($input as $value) {
	            if ( !array_key_exists($columnKey, $value)) {
	                trigger_error("Key \"$columnKey\" does not exist in array");
	                return false;
	            }
	            if (is_null($indexKey)) {
	                $array[] = $value[$columnKey];
	            }
	            else {
	                if ( !array_key_exists($indexKey, $value)) {
	                    trigger_error("Key \"$indexKey\" does not exist in array");
	                    return false;
	                }
	                if ( ! is_scalar($value[$indexKey])) {
	                    trigger_error("Key \"$indexKey\" does not contain scalar value");
	                    return false;
	                }
	                $array[$value[$indexKey]] = $value[$columnKey];
	            }
	        }
	        return $array;
	    }
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
	//taken from https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-1.php
	function quick_sort($my_array){
		$loe = $gt = array();
		if(count($my_array) < 2)
		{
			return $my_array;
		}
		$pivot_key = key($my_array);
		$pivot = array_shift($my_array);
		foreach($my_array as $val)
		{
			if($val <= $pivot)
			{
				$loe[] = $val;
			}elseif ($val > $pivot)
			{
				$gt[] = $val;
			}
		}
		return array_merge(quick_sort($loe),array($pivot_key=>$pivot),quick_sort($gt));
	}
	
	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	$connection = serverConnect();

	$search_query = $_POST['zipcode'];
	$contract_start = $_POST['begin_date'];
	$contract_end = $_POST['end_date'];
	$storage_preference = $_POST['storage_preference'];

	// testing
	$search_query = 47906;
	$contract_start = 2018-05-09;
	$contract_end = 2018-05-15;
	$storage_preference = 'cooler';
	// testing

	$search_lat_long_query = "SELECT * FROM zipcode_lat_long WHERE zipcode = $search_query";
	$search_lat_long_result = mysqli_query($connection, $search_lat_long_query);
	$search_lat_long_assoc = mysqli_fetch_assoc($search_lat_long_result);

	//latitude and longitude of the search zipcode
	$search_lat = $search_lat_long_assoc['latitude'];
	$search_long = $search_lat_long_assoc['longitude'];

	$query = "SELECT warehouse_id, zipcode, weighted_average_rating, latitude, longitude FROM Warehouse WHERE storage_pref = '".$storage_preference."' ORDER BY warehouse_id ASC";
	$result = mysqli_query($connection, $query);
	//columns [0,1,2, 3, 4, 5] [warehouse_d, zipcode, average_rating, latitude, longitude, distance]; where storage preference is the user's preference
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){
		$wh_pref[$index]['warehouse_id'] = $row['warehouse_id'];
		$wh_pref[$index]['zipcode'] = $row['zipcode'];
		$wh_pref[$index]['average_rating'] = $row['weighted_average_rating'];
		$wh_pref[$index]['latitude'] = $row['latitude'];
		$wh_pref[$index]['longitude'] = $row['longitude'];
		$index++;
	}//wh_pref: columns [0,1,2, 3, 4, 5] [warehouse_d, zipcode, average_rating, latitude, longitude, distance]; where storage preference is the user's preference

	$size = sizeof($wh_pref);
	$index = 0;
	while($index < $size){
		$current_lat = $wh_pref[$index]['latitude'];
		$current_long = $wh_pref[$index]['longitude'];
		$wh_pref[$index]['distance'] = getDistance($search_lat, $search_long, $current_lat, $current_long, 'M');
		$distance[$index] = $wh_pref[$index]['distance'];
		$ratings[$index] = $wh_pref[$index]['average_rating'];
		$index++;
	}

	$sorted_distance = quick_sort($distance);
	$sorted_100 = array();
	$index = 0;
	while($index < 100){
		$sorted_100[$index] = $sorted_distance[$index];
		$index++;
	}
	$size = sizeof($sorted_100);
	$index = 0;

	while($index < $size){
		$key = array_search($sorted_100[$index], array_column($wh_pref, 'distance'));
		$sorted_distance_zip_id[$index]['distance'] = $sorted_distance[$index];
		$sorted_distance_zip_id[$index]['wh_id'] = $wh_pref[$key]['warehouse_id'];
		$sorted_distance_zip_id[$index]['average_rating'] = $wh_pref[$key]['average_rating'];
		

		$distance_d_wh[$index] = $sorted_distance_zip_id[$index]['distance'];
		$wh_id_d_wh[$index] = $sorted_distance_zip_id[$index]['wh_id'];
		$rating_d_wh[$index] = $sorted_distance_zip_id[$index]['average_rating'];
		$index++;

	}//array sorted by distance with relevant information inside
	
	$size = sizeof($distance_d_wh);
	$index = 1;
	$warehouse_id_d[0] = $wh_id_d_wh[0];
	while($index < $size){ //returning this
		if(!($warehouse_id_d[$index] == $warehouse_id_d[$index - 1])){
			$warehouse_id_d[$index] = $wh_id_d_wh[$index];
			$warehouse_distance_d[$index] = $distance_d_wh[$index];
		}
		$index++;
	}

	$sorted_rating = quick_sort($ratings);
	$sorted_100a = array();
	$index = 0;
	
	while($index < 100){
		$sorted_100a[$index] = $sorted_rating[$index];
		$index++;
	}
	
	$size = sizeof($sorted_100a);
	$index = 0;
	while($index < $size){
		$key = array_search($sorted_rating[$index], array_column($wh_pref, 'average_rating'));
		$rating_r_wh[$index] = $sorted_rating[$index];
		$wh_id_r_wh[$index] = $wh_pref[$key]['warehouse_id'];
		$distance_r_wh[$index] = $wh_pref[$key]['distance'];
		$index++;
	} //array sorted by rating with relevant information inside
	
	$size = sizeof($rating_r_wh);
	$index = 1;

	$warehouse_id[0] = $wh_id_r_wh[0];
	while($index < $size){ //returning this
		if(!($warehouse_id_r[$index] == $warehouse_id_r[$index - 1])){
			$warehouse_id_r[$index] = $wh_id_r_wh[$index];
			$warehouse_distance_r[$index] = $distance_r_wh[$index];
		}
		$index++;
	}

	function sort_by_distance(){
		$size_ratings = sizeof($warehouse_id_r);
		$index = 0;
		while($index < $size_ratings){
			$current_warehouse = $warehouse_id_r[$index];
			$query = "SELECT * FROM Warehouse WHERE warehouse_id = $current_warehouse";
			$result = mysqli_query($connection, $query);
			if($result){
				$assoc_array = mysqli_fetch_assoc($result);
				$warehouse_id[$index] = $warehouse_id_r[$index];
				$storage_type[$index] = $assoc_array['storage_pref'];
				$capacity[$index] = $assoc_array['capacity'];
				$size[$index] = $assoc_array['size'];
				$price_per_skid[$index] = $assoc_array['price_per_skid'];
				$zipcode[$index] = $assoc_array['zipcode'];
				$average_rating[$index] = $assoc_array['weighted_average_rating'];
				$index++;
			}
		}
		
			echo"<table class='table table-hover table-striped'>
			<thead>
			<tr>
				<th scope='col'>Warehouse ID</th>
				<th scope='col'>Warehouse Distance</th>
				<th scope='col'>Warheouse Rating</th>
				<th scope='col'>Warehouse Zipcode</th>
				<th scope='col'>More Information</th>
			</tr>
			</thead>
			<tbody>";
			$index = 0;
			while($index < $size_ratings){
				echo"<tr data-warehouseid='".$warehouse_id[$index]."'>
				<td scope='col'>".$warehouse_id[$index]."</td>
				<td scope='col'>".$warehouse_distance_d[$index]."</td>
				<td scope='col'>".$average_rating[$index]."</td>
				<td scope='col'><button id='more-info' type='button' class='btn btn-info' data-toggle='modal' data-target='#search-result-modal'>More Info</button></td>
				</tr>";
				$index++;
			}
			echo"</tbody></table>";
	}

	
	function sort_by_rating(){
		$size_ratings = sizeof($warehouse_id_r);
		$index = 0;
		while($index < $size_ratings){
			$current_warehouse = $warehouse_id_r[$index];
			$query = "SELECT * FROM Warehouse WHERE warehouse_id = $current_warehouse";
			$result = mysqli_query($connection, $query);
			if($result){
				$assoc_array = mysqli_fetch_assoc($result);
				$warehouse_id[$index] = $warehouse_id_r[$index];
				$storage_type[$index] = $assoc_array['storage_pref'];
				$capacity[$index] = $assoc_array['capacity'];
				$size[$index] = $assoc_array['size'];
				$price_per_skid[$index] = $assoc_array['price_per_skid'];
				$zipcode[$index] = $assoc_array['zipcode'];
				$average_rating[$index] = $assoc_array['weighted_average_rating'];
				$index++;
			}
		}
		
			echo"<table class='table table-hover table-striped'>
			<thead>
			<tr>
				<th scope='col'>Warehouse ID</th>
				<th scope='col'>Warehouse Distance</th>
				<th scope='col'>Warheouse Rating</th>
				<th scope='col'>Warehouse Zipcode</th>
				<th scope='col'>More Information</th>
			</tr>
			</thead>
			<tbody>";
			$index = 0;
			while($index < $size_ratings){
				echo"<tr data-warehouseid='".$warehouse_id[$index]."'>
				<td scope='col'>".$warehouse_id[$index]."</td>
				<td scope='col'>".$warehouse_distance_r[$index]."</td>
				<td scope='col'>".$average_rating[$index]."</td>
				<td scope='col'><button id='more-info' type='button' class='btn btn-info' data-toggle='modal' data-target='#search-result-modal'>More Info</button></td>
				</tr>";
				$index++;
			}
			echo"</tbody></table>";
	}


	

	

	mysqli_close($connection);
	?>

