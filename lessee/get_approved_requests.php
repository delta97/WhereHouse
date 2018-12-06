<?php
    error_reporting(E_ERROR | E_PARSE);
	if (!function_exists('serverConnect')) {
    	require "serverconnect.php";
	}
	
	$connection = serverConnect();

	$user_id = $_SESSION['user_id'];

	$query = "SELECT * FROM Contracts WHERE lessee_id = $user_id AND status = 'Accepted' OR status = 'Active' OR status = 'Terminated' ORDER BY start_date DESC";
	$result = mysqli_query($connection, $query);
	$assoc_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$contract_id = $assoc_array['contract_id'];
	$start_date = $assoc_array['start_date'];
	$end_date = $assoc_array['end_date'];
	$total_price = $assoc_array['total_price'];
	$Skid_num = $assoc_array['num_skids'];
	$storage_pref = $assoc_array['storage_pref'];
	$deposit = $ssoc_array['deposit'];
	$Status = $assoc_array['status'];
	$WH_id = $assoc_array['wh_id'];

	$num_requests = sizeof($contract_id);

	if($num_requests > 0) {
		echo"<table class=\"table table-white table-hover\">
				<thead>
					<tr>
						<th>Contract ID</th>
						<th>Warehouse ID</th>
						<th>Requested Duration</th>
						<th>Price</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>";
		for($x = 0; $x < $num_requests + 1; $x++) {
			echo"<tr>
					<td>".$contract_id."</td>
					<td>".$WH_id."</td>
					<td>".$start_date." - ".$end_date."</td>
					<td>".$total_price."</td>
					<td>".$Status."</td>
				</tr>";
		}

		echo"</tbody></table>";
	}
	else {
		echo"<h2 style=\"padding-top:40px; text-align:center;\">You don't have any past warehouse rental requests.</h2>";
	}

	mysqli_close($connection);

?>
