<?php

	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}

	$connection = serverConnect();

	$contract_id = $_POST['contract_id'];


	$query = "SELECT * FROM Contract WHERE contract_id = $contract_id";
	$result = mysqli_query($connection, $result);
	if($result){
		$contract_array = mysqli_fetch_assoc($result);
	}
	else{
		echo("error");
	}

	$return = json_encode($contract_array);
	echo($return);
	mysqli_close($connection);


?>