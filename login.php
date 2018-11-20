<?php 
if(session_status() == PHP_SESSION_NONE) {
	session_start();
}

require "serverconnect.php";
$connection = serverConnect();

$user_email = $_POST["login-modal-email"];
$user_password = $_POST["login-modal-password"];

$query = "SELECT password, user_type, id FROM User WHERE email = '".$user_email."';";
$result = mysqli_query($connection, $query);
if($result) {
	$assoc_array = mysqli_fetch_assoc($result);

	$user_id = $assoc_array["id"];
	$user_type = $assoc_array['user_type'];

	if($assoc_array["password"] == $user_password){
		$_SESSION['user_email'] = $user_email;
		$_SESSION['user_id'] = $user_id;
		$_SESSION['user_type'] = $user_type;
	}
	else {
		//password doesn't match, but email exists
		$_SESSION['user_type'] = -2;
	}
	
}
else { //The user's email doesn't exist in the database -->they need to make an account still
	$_SESSION['user_type'] = -1; 
}


mysqli_close($connection);


?>