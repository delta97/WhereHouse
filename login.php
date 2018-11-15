<?php 


require "serverconnect.php";
$connection = serverConnect();

$user_email = $_POST["login-modal-email"];
$user_password = $_POST["login-modal-password"];

$query = "SELECT password, user_type, id FROM User WHERE email = '$user_email'";
$result = mysqli_query($connection, $query);

$assoc_array = mysqli_fetch_assoc($result);

$user_email = $assoc_array["email"];
$user_id = $assoc_array["id"];

if($assoc_array["password"] == $user_password){
	$_SESSION['user_email'] = $user_email;
	$_SESSION['user_password'] = $user_password;
	$_SESSION['user_id'] = $user_id;

	if($assoc_array["user_type"] == 1) {
		$_SESSION['user_type'] = 1;
	}
	else {
		$_SESSION['user_type'] = 0;
	}
}
else {
	$_SESSION['user_type'] = -1; 
	//must remember to close the session after the error is issued
}


mysqli_close($connection);


?>