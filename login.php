<?php 
// header('Content-type:application/json');
  //decodes the string sent in JSON format into an associative PHP array
// $data = json_decode($_POST(file_get_contents('php://input')), true);
// $data = $_POST['data'];
$email = $_POST['login-modal-email'];
$password = $_POST['login-modal-password'];


// $email = 'ladmin@purdue.edu';
// $password = 'password';

$response = array('email' => $email, 'password' => $password);
echo($response);



// $email = 'ladmin@purdue.edu';
// $password = 'Password!';

// if(session_status() == PHP_SESSION_NONE) {
// 	session_start();
// }
// else{
// 	session_destroy();
// 	session_start();
// }


// require "serverconnect.php";
// $connection = serverConnect();


// $query = "SELECT User_id, first_name, last_name, password FROM User WHERE email = 'ladmin@purdue.edu'";
// $result = mysqli_query($connection, $query);

// if($result) {
// 	$assoc_array = mysqli_fetch_assoc($result);

// 	if($assoc_array["password"] == $password){
// 		$_SESSION['user_id'] = $assoc_array["User_id"];
// 		// $_SESSION['user_type'] = $assoc_array["user_type"];
// 		$_SESSION['user_first_name'] = $assoc_array["first_name"];
// 		$_SESSION['user_last_name'] = $assoc_array["last_name"];
// 	}
// 	else {
// 		//password doesn't match, but email exists
// 		$_SESSION['user_type'] = -2;
// 	}
	
// }
// else { //The user's email doesn't exist in the database -->they need to make an account still
// 	$_SESSION['user_type'] = -1; 
// }

// $response = json_encode(array("user_id" => '1', "user_first_name" => $_SESSION['user_first_name'], "user_last_name" => $_SESSION['user_last_name'], "user_email" => $email)); //json_encode simply takes the array and makes a string in JSON format to send back to the javascript AJAX request for handling
// echo($response);


// mysqli_close($connection);
 // "user_type" => $_SESSION['user_type'],

?>