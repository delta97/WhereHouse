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
	



?>