<?php
	$user_id = $_POST['user_id'];
	

	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}
	$connection = serverConnect();


	//find out if there are any current rentals
	$query = "SELECT * FROM Contract WHERE lessee_id = $user_id AND status = 'Active'";
	$result = mysqli_query($connection, $query);
	$assoc_array = mysqli_fetch_assoc($result);
	$num_rentals = sizeof($assoc_array);

	//find out how many open requests there are
	$query2 = "SELECT * FROM Contract WHERE lessee_id = $user_id AND status = 'Pending' OR status = 'Accepted'";
	$result2 = mysqli_query($connection, $query2);
	$assoc_array2 = mysqli_fetch_assoc($result2);
	$num_requests = sizeof($assoc_array2);

	//find out how many unread messages there are 
	$query3 = "SELECT * FROM Messages WHERE recipient_id = $user_id AND message_status = 0";
	$result3 = mysqli_query($connection, $query3);
	$assoc_array3 = mysqli_fetch_assoc($result3);
	$num_unchecked_messages = sizeof($assoc_array3);

	$return = json_encode(array("num_rentals" => $num_rentals, "num_requests" => $num_requests, "num_unchecked_messages" => $num_unchecked_messages));
	echo($return);

	mysqli_close($connection);


?>
