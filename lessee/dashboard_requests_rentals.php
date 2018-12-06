<?php 
	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	

	$user_id = $_POST['user_id'];

	$connection = serverConnect();

	$query = "SELECT * FROM Contract WHERE lessee_id = $user_id AND status = 'Pending' LIMIT 3 ORDER BY owner_id ASC";
	$result = mysqli_query($connection, $query);
	$pending_requests = array(); //array of pending reqests for the given user ID.
	if($result) {
		while($row = mysqli_assoc($result)){
		$pending_requests[] = $row;
		}
	}
	
	$warehouse_id_pending = $pending_requests['wh_id'];
	$owner_id_pending = $pending_requests['owner_id'];
	$contract_start_pending = $pending_requests['start_date'];
	$contract_end_pending = $pending_requests['end_date'];

	$query = "SELECT * FROM Contract WHERE lessee_id = $user_id AND status = 'Active' LIMIT 3 ORDER BY owner_id ASC";
	$result = mysqli_query($connection, $query);
	$active_rentals = array(); //array of active rentals for the given user ID

	if($result){
		while($row = mysqli_assoc($result)){
			$active_rentals[] = $row;
		}
	}
	$warehouse_id_active = $active_rentals['wh_id'];
	$owner_id_active = $active_rentals['owner_id'];
	$contract_start_active = $active_rentals['start_date'];
	$contract_end_active = $active_rentals['end_date'];

	//getting the company name of the owner of the 
	$warehouse_name_active = array();
	$query = "SELECT company_name FROM Owner WHERE owner_id = $owner_id_active ORDER BY owner_id ASC";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result)){
		$warehouse_name_active[] = $row;
	}

	$warehouse_name_pending = array();
	$query = "SELECT company_name FROM Owner WHERE owner_id = $owner_id_pending ORDER BY owner_id ASC";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result)){
		$wareouse_name_pending[] = $row;
	}
	





	$return = json_encode(array("warehouse_name_active" => $warehouse_name_active, "warehouse_name_pending" => $warehouse_name_pending, "warehouse_id_pending" => $warehouse_id_pending, "owner_id_pending" => $owner_id_pending, "contract_start_pending" => $contract_start_pending, "contract_end_pending" => $contract_end_pending, "warehouse_id_active" => $warehouse_id_active, "owner_id_active" => $owner_id_active, "contract_start_active" => $contract_start_active, "contract_end_active" => $contract_end_active));


	echo($return);

	mysqli_close($connection);

?>