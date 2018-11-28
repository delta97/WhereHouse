<?php 
header('Content-Type: application/json');

$post_data = json_decode(file_get_contents('php://input'), true);
$email = $post_data['email'];
$password = $post_data['password'];


if(session_status() == PHP_SESSION_NONE) {
	session_start();
}


require "serverconnect.php";
$connection = serverConnect();


$query = "SELECT User_id, first_name, last_name, user_type, password FROM User WHERE email = '".$email."';";
$result = mysqli_query($connection, $query);

if($result) {
	$assoc_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

	if($assoc_array["password"] == $password){
		$user_id = $assoc_array["User_id"];
		$user_type = $assoc_array["user_type"];
		$user_first_name = $assoc_array["first_name"];
		$user_last_name = $assoc_array["last_name"];
	}
	else {
		//password doesn't match, but email exists
		$user_type = -2;
	}
	
}
else { //The user's email doesn't exist in the database -->they need to make an account still
	$user_type = -1; 
}

$user_type_should_be = 0;


$response = json_encode(array('user_email' => $email, 'sql' => $user_type_should_be, 'user_password' => $password, 'user_id' => $user_id, 'user_type' => $user_type, 'user_first_name' => $user_first_name, 'user_last_name' => $user_last_name));




echo($response);

mysqli_close($connection);


?>