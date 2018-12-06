<?php
	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	$connection = serverConnect();

	$contract_id = $_POST['contract_id'];


	$query = "SELECT * FROM Contract WHERE id = $contract_id ORDER BY id";
	$result = mysqli_query($connection, $query);
	$contract_assoc = array();

	while($row = mysqli_fetch_assoc($result)){
		$contract_assoc[] = $row;
	}

	$contract_id = $contract_assoc['id'];
	$lessee_id = $contract_assoc['Lessee_id'];
	$warehouse_id = $contract_assoc['WH_id'];
	$contract_start = $contract_assoc['start_date'];
	$contract_end = $contract_assoc['end_date'];
	$total_price = $contract_assoc['total_price'];
	$num_skids = $contract_assoc['num_skids'];
	$temp_control = $contract_assoc['temp_control'];
	$security_deposit = $contract_assoc['security_deposit'];


	$query = "SELECT * FROM User WHERE id = $lessee_id";
	$result = mysqli_query($connection, $query);
	$renter_assoc = mysqli_assoc($result);

	$renter_first_name = $renter_assoc['first_name'];
	$renter_last_name = $renter_assoc['last_name'];
	$renter_email = $renter_assoc['email'];
	$renter_phone = $renter_assoc['phone_num'];

	$return = json_encode(array("renter_last_name" => $renter_last_name, "renter_first_name" => $renter_first_name, "renter_phone" => $renter_phone, "renter_email" => $renter_email, "contract_start" => $contract_start, "contract_end" => $contract_end, "total_price" => $total_price, "num_skids" => $num_skids, "temp_control" => $temp_control, "security_deposit" => $security_deposit, "warehouse_id" => $warehouse_id));

	echo($return);

	mysqli_close($connection);



?>