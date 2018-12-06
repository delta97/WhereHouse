<?php
//generates a number of unopened messages, active/accepted requests, and pending requests.
	require 'serverconnect.php';
	$connection = serverConnect();

	$user_id = $_SESSION['user_id'];


	$query = "SELECT message_id FROM Messages WHERE message_status = 0 AND recipient_id = '".$user_email."';";
	$result = mysqli_query($connection, $query);

	if($result){
		$associative_array = mysqli_assoc($result);
		$unchecked_messages = $associative_array['message_id'];
		$num_unchecked_messages = sizeof($unchecked_messages);

	}
	else {
		$num_unchecked_messages = 0;
	}

	$query = "SELECT id FROM Contract WHERE Lessee_id = $user_id AND Status = 'Pending'";
	$result = mysqli_query($connection, $query);

	if($result) {
		$assoc_array = mysqli_assoc($result);
		$requests = $assoc_array['id'];
		$num_requests = sizeof($requests);
	}
	else {
		$num_requests = 0;
	}

	$query = "SELECT id FROM Contract WHERE Lessee_id = $user_id AND Status = 'Active' OR Status = 'Accepted'";
	$result = mysqli_query($connection, $result);
	if($result) {
		$assoc_array = mysqli_assoc($result);
		$rentals = $assoc_array['id'];
		$num_rentals = sizeof($rentals);
	}
	else {
		$num_rentals = 0;
	}


	$return_array = array("num_unchecked_messages": $num_unchecked_messages, "num_requests":$num_requests, "num_rentals":$num_rentals);

	echo(json_encode($return_array));

	mysqli_close($connection);

?>
