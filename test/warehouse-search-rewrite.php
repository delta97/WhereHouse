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

/* 
	general formula we're trying to emulate here 
	- first select all warehouses within 200 miles
	- select all warehouses that have openings for the given start and end date
	- of the remaining warehouses, apply a weighted formula


	grade = 100[(rating + distance)] where rar



*/


	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	$connection = serverConnect();

	$search_query = $_POST['zipcode'];
	$contract_start = $_POST['begin-date'];
	$contract_end = $_POST['end-date'];
	$num_skids = $_POST['num-skids'];
	$storage_preference = $_POST['storage_preference'];

	// testing
	$search_query = 92024;
	$contract_start = 2018-05-09;
	$contract_end = 2018-05-29;
	$num_skids = 150;
	// testing

	$search_lat_long_query = "SELECT * FROM zipcode_lat_long WHERE zipcode = $search_query";
	$search_lat_long_result = mysqli_query($connection, $search_lat_long_query);
	$search_lat_long_assoc = mysqli_fetch_assoc($search_lat_long_result);

	//latitude and longitude of the search zipcode
	$search_lat = $search_lat_long_assoc['latitude'];
	$search_long = $search_lat_long_assoc['longitude'];



	$query = "SELECT warehouse_id, zipcode, average_rating, latitude, longitude FROM Warehouse WHERE storage_type = $storage_preference ORDER BY warehouse_id ASC";
	$result = mysqli_query($connection, $query);
	$id_zip_rating = array();

	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
		$id_zip_rating[] = $row; //columns [0,1,2, 3, 4, 5] [warehouse_d, zipcode, average_rating, latitude, longitude, distance]; where storage preference is the user's preference
	}


	$index = 0;
	$distance = array();
	$distance_id = array(array(), array());
	while($index < sizeof($id_zip_rating)){
		$distance[$index] = getDistance($search_lat, $search_long, $id_zip_rating[$index][3], $id_zip_rating[$index][4], "M");
		$id_zip_rating[$index][5] = $distance[$index]; //sorted by warehouse id
		$index++;
	}

	$sorted_distance = quick_sort($distance);

	$sorted_distance_zip_id = array(array(), array(), array()); //array of distance, zipcode, and warehouse ID sorted by distance
	$index = 0;
	while($index < sizeof($distance)){
		$key = array_search($sorted_disatances[$index], $id_zip_rating[5]);
		$sorted_distance_zip_id[$index][0] = $sorted_distance[$index]; //distance
		$sorted_distance_zip_id[$index][1] = $id_zip_rating[$key][0]; //warehouse id
		$sorted_distance_zip_id[$index][2] = $id_zip_rating[$key][1]; //zipcode
		$index++;
	}
	$length_sort_dist = sizeof($sorted_distances_zip_id);
	$index = 0;
	while($index < $length_sort_dist){
		$sorted_distances_zip_id[$index] = $sorted_distances_zip_id[$index];
		$index++;
	}

	//$sorted_distances_zip_id is now only 200 warehouses long or less
	$index = 0;
	
	$contract_information = array();
	while($index < $length_sort_dist){
		$warehouse_id = $sorted_distance_zip_id[$index][1];
		$query = "SELECT contract_id, start_date, end_date, num_skids, Contract.warehouse_id, total_price Warehouse.capacity FROM Contract FULL OUTER JOIN Warehouse ON Contract.warehouse_id = Warehouse.warehouse_id WHERE warehouse_id = $warehouse_id AND (status ='Accepted' OR status='Active')";
		$result = mysqli_query($connection, $query);
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			$contract_information[] = $row; //[0,1,2,3,4,5, 6] [contract_id, start date, end date, num skids, warehouse id, total price, warehouse capacity]
		}
		$index++;
	}

	$length_contract_info = sizeof($contract_information);


	//selecting available warehouses

	$capacity_able_warehouses = array();
	$capacity_index = 0;
	$index = 0;
	$interior_index = 0;

	while($index < $length_contract_info){
		$current_wh_id = $contract_information[$index][4];

		$query1 = "SELECT Contract.contract_id contract_id, SUM(Contract.num_skids) total_num_skids, Warehouse.capacity capacity, Warehouse.warehouse_id warehouse_id FROM Contract INNER JOIN Warehouse ON Contract.warehouse_id = Warehouse.warehouse_id WHERE Contract.warehouse_id = $current_wh_id AND Contract.start_date >= $contract_start AND Contract.end_date >= $contract_end AND Contract.status = 'Pending' OR Contract.status = 'Active' GROUP BY Warehouse.warehouse_id ORDER BY Warehouse.warehouse_id ASC"; //where the start date after our start date and end date after our end date
		$query2 = "SELECT Contract.contract_id contract_id, SUM(Contract.num_skids) total_num_skids, Warehouse.capacity capacity, Warehouse.warehouse_id warehouse_id FROM Contract INNER JOIN Warehouse ON Contract.warehouse_id = Warehouse.warehouse_id WHERE Contract.warehouse_id = $current_wh_id AND Contract.start_date >= $contract_start AND end_date <= $contract_end AND status = 'Pending' OR status = 'Active' GROUP BY Warehouse.warehouse_id ORDER BY Warehouse.warehouse_id ASC";
		$query3 = "SELECT Contract.contract_id contract_id, SUM(Contract.num_skids) total_num_skids, Warehouse.capacity capacity, Warehouse.warehouse_id warehouse_id FROM Contract INNER JOIN Warehouse ON Contract.warehouse_id = Warehouse.warehouse_id WHERE Contract.warehouse_id = $current_wh_id AND Contract.start_date <= $contract_start AND end_date <= $contract_end AND status = 'Pending' OR status = 'Active' GROUP BY Warehouse.warehouse_id ORDER BY Warehouse.warehouse_id ASC";
		$query4 = "SELECT Contract.contract_id contract_id, SUM(Contract.num_skids) total_num_skids, Warehouse.capacity capacity, Warehouse.warehouse_id warehouse_id FROM Contract INNER JOIN Warehouse ON Contract.warehouse_id = Warehouse.warehouse_id WHERE Contract.warehouse_id = $current_wh_id AND Contract.start_date <= $contract_start AND end_date >= $contract_end AND status = 'Pending' OR status = 'Active' GROUP BY Warehouse.warehouse_id ORDER BY Warehouse.warehouse_id ASC";
	}
	

	$result1 = mysqli_query($connection, $query1);
	$eligible_wh_ids = array();
	$non_eligible_wh_ids = array();
	$n_el_wh_index = 0;
	$el_wh_index= 0;
	$assoc_1 = array();
	if($result1){
		while($row = mysqli_fetch_assoc($result1)){
			$assoc_1[] = $row;
		}
		$size1 = sizeof($assoc_1);
		$index = 0;
		while($index < $size1){
			$current_warehouse_id = $assoc_1[$index][warehouse_id];
			$current_num_skids = $assoc_1[$index]['total_num_skids'];
			$total_skids = $current_num_skids + $num_skids;
			$current_capacity = $assoc_1[$index]['capacity'];
			if($total_skids <= $current_capacity){
				$eligible_wh_ids[$el_wh_index] = $current_warehouse_id;
				$el_wh_index++;
			}
			else {
				$non_eligible_wh_ids[$n_el_wh_index] = $current_warehouse_id;
				$n_el_wh_index++;
			}
			$index++;
		}
	}
	
	$result2 = mysqli_query($connection, $query2);
	$assoc_2 = array();
	if($result2){
		while($row = mysqli_fetch_assoc($result2)){
			$assoc_2[] = $row;
		}
		$size2 = sizeof($assoc_2);
		$index = 0;
		while($index < $size2){
			$current_warehouse_id = $assoc_2[$index]['warehouse_id'];
			$current_num_skids = $assoc_2[$index]['total_num_skids'];
			$total_skids = $current_num_skids + $num_skids;
			$current_capacity = $assoc_2[$index]['capacity'];
			if($total_skids <= $current_capacity){
				$current_size = sizeof($eligible_wh_ids);
				$size_index = 0;
				$found_item = false;
				while($size_index < $current_size && $found_item == false){
					if($eligible_wh_ids[$size_index] == $current_warehouse_id){
						$found_item = true;
					}
					$size_index++;
				}
				if($found_item == false){
					$eligible_wh_ids[$el_wh_index] = $current_warehouse_id;
					$el_wh_index++;
				}
			}
			else {
				$non_eligible_wh_ids[$n_el_wh_index] = $current_warehouse_id;
				$n_el_wh_index++;
			}
			$index++;
		}
	}
	

	$result3 = mysqli_query($connection, $query3);
	$assoc_3 = array();
	if($result3){
		while($row = mysqli_fetch_assoc($result3)){
			$assoc_3[] = $row;
		}
		$size3 = sizeof($assoc3);
		$index = 0;
		while($index < $size3){
			$current_warehouse_id = $assoc_3[$index]['warehouse_id'];
			$current_num_skids = $assoc_3[$index]['total_num_skids'];
			$total_skids = $current_num_skids + $num_skids;
			$current_capacity = $assoc_3[$index]['capacity'];
			if($total_skids <= $current_capacity){
				$current_size = sizeof($eligible_wh_ids);
				$size_index = 0;
				$found_item = false;
				while($size_index < $current_size && $found_item == false){
					if($eligible_wh_ids[$size_index] == $current_warehouse_id){
						$found_item = true;
					}
					$size_index++;
				}
				if(found_item == false){
					$eligible_wh_ids[$el_wh_index] = $current_warehouse_id;
					$el_wh_index++;
				}
			}
			else {
				$non_eligible_wh_ids[$n_el_wh_index] = $current_warehouse_id;
				$n_el_wh_index++;
			}
			$index++;
		}
	}
	

	$result4 = mysqli_query($connection, $query4);
	$assoc_4 = array();
	if($result4){
		while($row = mysqli_fetch_assoc($result4)){
			$assoc_4[] = $row;
		}
		$size4 = sizeof($assoc4);
		$index = 0;
		while($index < $size4){
			$current_warehouse_id = $assoc_4[$index]['warehouse_id'];
			$current_num_skids = $assoc_4[$index]['total_num_skids'];
			$total_skids = $current_num_skids + $num_skids;
			$current_capacity = $assoc_4[$index]['capacity'];
			if($total_skids <= $current_capacity){
				$current_size = sizeof($eligible_wh_ids);
				$size_index = 0;
				$found_item = false;
				while($size_index < $current_size && $found_item == false){
					if($eligible_wh_ids[$size_index] == $current_warehouse_id){
						$found_item = true;
					}
					$size_index++;
				}
				if(found_item == false){
					$eligible_wh_ids[$el_wh_index] = $current_warehouse_id;
					$el_wh_index++;
				}
			}
			else {
				$non_eligible_wh_ids[$n_el_wh_index] = $current_warehouse_id;
				$n_el_wh_index++;
			}
			$index++;
		}
	}

	//by this point we now have an eligible array and a non eligible array. We now need to compare the two and make a third final array containing only elements that are in the eligible array but NOT the ineligible array

	$non_eligible_size = sizeof($non_eligible_wh_ids);
	$eligible_size = sizeof($eligible_wh_ids);

	$final_wh_ids = array();
	$index_e = 0;
	$index_n = 0;
	$index_f = 0;
	while($index_e < $eligible_size){
		$current_e_id = $eligible_wh_ids[$index_e];
		$found = false;
		while($index_n < $non_eligible_size && $found = false){
			$current_n = $non_eligible_wh_ids[$index_n];
			if($current_e_id == $current_n){
				$found = true;
			}
			$index_n++;
		}
		if($found == false){
			$final_wh_ids[$index_f] = $current_e_id;
			$index_f++;
		}
		$index_e++;
	}
	
	//now the results all lie in final_wh_ids

	








	





// for($y = 0; $y < 4; $y++){
// 			echo"<td>".$warehouse_zip_lat_long[$x][$y]."</td>";
// 		}



	echo"<table>";
	for($x = 0; $x < sizeof($warehouse_zip_lat_long); $x++){
		echo"<tr><td>";
		echo($contract_information[$x][6]);
		echo"</td></tr>";
	}
	echo"</table>";


	?>
