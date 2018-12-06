<?php
	if(!function_exists(serverConnect())){
		require "serverconnect.php";
	}
	$connection = serverConnect();

	$user_id = $_POST['user_id'];
	$cc_num = $_POST['cc_num'];
	$exp_month = $_POST['exp_month'];
	$exp_year = $_POST['exp_year'];
	$cvc = $_POST['cvc'];

	$query = "INSERT INTO Lessee (lessee_id, credit_card_num, expiration_month, expiration_year, CVC) VALUES (".$user_id.", ".$cc_num.", ".$exp_month.", ".$exp_year.", ".$cvc.")";
	$result = mysqli_query($connection, $query);
	if(!result){
		$error = 1;
	}
	else{
		$error = 0;
	}
	echo(json_encode(array("error" => $error)));
	mysqli_close($connection);

?>