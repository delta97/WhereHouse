<?php 

if(session_status() == PHP_SESSION_NONE) {
	session_start();
}
else{
	session_destroy();
	session_start();
}

$email = $_POST['login-modal-email'];
$password = $_POST['login-modal-password'];




require "serverconnect.php";
$connection = serverConnect();


$query = "SELECT id, first_name, last_name, password FROM User WHERE email = '$email'";
$result = mysqli_query($connection, $query);

if($result) {
	$assoc_array = mysqli_fetch_assoc($result);

	if($assoc_array["password"] == $password){
		$user_id = $assoc_array["id"];
		$_SESSION['user_first_name'] = $assoc_array["first_name"];
		$_SESSION['user_last_name'] = $assoc_array["last_name"];
		$_SESSION['user_email'] = $email;
		$_SESSION['user_id'] = $user_id;


		$user_type_query = "SELECT COUNT(lessee_id) FROM Lessee WHERE lessee_id = $user_id";
		$result2 = mysqli_query($connection, $user_type_query);
		$assoc_lessee = mysqli_fetch_array($result2, MYSQLI_NUM);
		if($assoc_lessee[0] > 0){
			$_SESSION['user_type'] = 0;
		}
		else {
			$_SESSION['user_type'] = 1;
			// $user_type_query = "SELECT * FROM Owner WHERE id = $user_id";
			// $result3 = mysqli_query($connection, $user_type_query);
			// $assoc_owner = mysqli_fetch_assoc($result3);
			// if(sizeof($assoc_owner) == 1){
			// 	$_SESSION['user_type'] = 1;
			// }
		}
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
$response = json_encode(array('email' => $_SESSION['user_email'], 'user_type' => $_SESSION['user_type'], 'user_first_name' => $_SESSION['user_first_name'], 'user_last_name' => $_SESSION['user_last_name'], 'user_id' => $_SESSION['user_id']));
echo($response);

?>