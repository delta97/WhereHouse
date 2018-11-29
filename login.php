<?php 
header("Content-Type: application/json; charset=UTF-8");



$email = json_decode($_REQUEST['email']);
$password = json_decode($_REQUEST['password']);






if(session_status() == PHP_SESSION_NONE) {
	session_start();
}
else{
	session_destroy();
	session_start();
}


require "serverconnect.php";
$connection = serverConnect();


$query = "SELECT User_id, first_name, last_name, user_type, password FROM User WHERE email = '".$email."'";
$result = mysqli_query($connection, $query);

if($result) {
	$assoc_array = mysqli_fetch_assoc($result);

	if($assoc_array["password"] == $password){
		$_SESSION['user_id'] = $assoc_array["User_id"];
		$_SESSION['user_type'] = $assoc_array["user_type"];
		$_SESSION['user_first_name'] = $assoc_array["first_name"];
		$_SESSION['user_last_name'] = $assoc_array["last_name"];
	}
	else {
		//password doesn't match, but email exists
		$_SESSION['user_type'] = -2;
	}
	
}
else { //The user's email doesn't exist in the database -->they need to make an account still
	$_SESSION['user_type'] = -1; 
}

$response = json_encode(array("user_id" => $_SESSION['user_id'], "user_type" => $_SESSION['user_type'], "user_first_name" => $_SESSION['user_first_name'], "user_last_name" => $_SESSION['user_last_name'], "user_email" => $email));
echo($response);


mysqli_close($connection);


?>