<?php
		require "serverconnect.php";
		$connection = serverConnect();
		$user_first_name = $_POST['user-first-name'];
		$user_last_name = $_POST['user-last-name'];
		$user_address_1 = $_POST['user-address-line1'];
		$user_address_2 = $_POST['user-address-line2'];
		$user_city = $_POST['user-city'];
		$user_state = $_POST['user-state'];
		$user_zip = $_POST['user-zip]'];
		$user_phone = $_POST['user-phone'];
		
		$query = "UPDATE User SET first_name = '".$user_first_name."', last_name = '".$user_last_name."',  address_1 = '".$user_address_1."', address_2 = '".$user_address_2."',user_city = '".$user_city."', user_zip = '".$user_zip."', user_phone = '".$user_phone."'";
		
		
		$result = mysqli_query($connection, $query);
		if(!$result) {
				echo error message here
		}
		else {
			$success = true;
			echo $success;
		}
		mysqli_close($connection);
?>

