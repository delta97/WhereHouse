<?php
	// error_reporting(E_ERROR | E_PARSE);
	if (!function_exists('serverConnect')) {
    	require "serverconnect.php";
	}
	$connection = serverConnect();

	$user_id = $_POST['user_id'];
	$user_id = 10135;


	$query = "SELECT contract_id, start_date, end_date, total_price, num_skids, storage_pref, deposit, status, warehouse_id FROM Contract WHERE lessee_id = $user_id AND status = 'Pending' ORDER BY start_date DESC";
	$result = mysqli_query($connection, $query);
	if($result){
		// $pending_requests = array();
		// while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		// 	$pending_requests[] = $row;
		// }
		$pending_requests = array();
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$pending_requests[] = $row;
		}
		
	
		$contract_id = $pending_requests['contract_id'];
		$start_date = $pending_requests['start_date'];
		$end_date = $pending_requests['end_date'];
		$total_price = $pending_requests['total_price'];
		$Skid_num = $pending_requests['num_skids'];
		$Temp_control = $pending_requests['storage_pref'];
		$Security_depost = $pending_requests['deposit'];
		$Status = $pending_requests['status'];
		$WH_id = $pending_requests['warehouse_id'];

		$num_requests = sizeof($pending_requests);

		if($num_requests > 0) {
			$error = false;
			echo(json_encode(array("contract_id" => $contract_id, "start_date" => $start_date, "end_date" => $end_date, "total_price" => $total_price, "num_skids" => $Skid_num, "storage_pref" => $Temp_control, "deposit" => $Security_deposit, "status" =>  $Status, "warehouse_id" => $WH_id, "error" => $error)));
		}
		else {
			$error = "<h2 style=\"padding-top:40px; text-align:center;\">You don't have any pending warehouse rental requests.</h2>";
			echo(json_encode(array("contract_id" => $contract_id, "start_date" => $start_date, "end_date" => $end_date, "total_price" => $total_price, "num_skids" => $Skid_num, "storage_pref" => $Temp_control, "deposit" => $Security_deposit, "status" =>  $Status, "warehouse_id" => $WH_id, "error" => $error)));
		}	
	}

	
	mysqli_close($connection);

?>
