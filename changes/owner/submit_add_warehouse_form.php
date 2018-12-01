<?php
	include 'warehouses.php';
	include '../serverconnect.php';

	$connection = serverConnect();

	$warehouse_name = $_POST['warehouse-name'];
	$address_line_1 = $_POST['warehouse-address-1'];
	$address_line_2 = $_POST['warehouse-address-2'];
	$city = $_POST['warehouse-city'];
	$state = $_POST['warehouse-state'];
	$zipcode = $_POST['warehouse-zipcode'];
	$owner_id = $_SESSION['user_id'];
	$lowest_temperature = $_POST['temperature-lower-bound'];
	$highest_temperature = $_POST['temperature-upper-bound'];

	$query = "INSERT INTO Warehouse (warehouse_name, address_1, address_2, city, state, zip) VALUES ('$warehouse_name', '$address_line_1', '$address_line_2', '$city', '$state', '$zipcode');";

	$result = mysqli_query($connection, $query);

	if($result) {
		echo "<script>console.log('new warehouse successfully added');
		reloadOnSubmit();
		</script>";
	}
?>