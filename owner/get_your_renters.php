<?php
	if(!function_exists(serverConnect)){
		require "serverconnnect.php";
	}

	$connection = serverConnect();

	$user_id = $_POST['user_id'];
	$user_id = 12345

	$query = "SELECT * FROM Contract WHERE owner_id = $user_id AND Status='Active' ORDER BY lessee_id DESC";
	$result = mysqli_query($connection, $query);
	$contract_assoc = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$lessee_ids = $contract_assoc['lessee_id'];
	$warehouse_ids = $contract_assoc['WH_id'];
	$contract_ids = $contract_assoc['id'];

	$lessee_info = array();
	for($x = 0; $x <= sizeof(lessee_ids); $x++){
		$lessee_info_query = "SELECT * FROM User WHERE id = $lessee_ids[$x] ORDER BY id DESC";
		$lessee_info_result = mysqli_query($connection, $lesse_info_query);
		$lessee_info[] = mysqli_fetch_assoc($lessee_info_result);
	}

	$lessee_id = $lessee_info["id"];
	$lessee_first_name = $lessee_info["first_name"];
	$lesse_last_name = $lessee_info['last_name'];

	$return = json_encode(array("lessee_first_name" => $lessee_first_name, "lessee_last_name" => $lessee_last_name, "contract_id" => $contract_ids, "warehouse_id" => warehouse_ids));
	echo($return);

	mysqli_close($connection);

?>