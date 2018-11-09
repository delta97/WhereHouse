 <!DOCTYPE html>

 <?php 
 	include "serverconnect.php";
 	$connection = serverConnect();

 	//query to get the user's id
 	$id_query = "SELECT id FROM User WHERE Email = '".$_SESSION['user_email']."'";

 	$result = mysqli_query($connection, $id_query);
	$assoc_array = mysqli_fetch_assoc($result);
	$user_id = $assoc_array["id"];

	mysqli_free_result($result);
 	//query to get the warehouses that correspond to that user id
	$query = "SELECT id FROM Warehouse WHERE owner_id = '".$user_id."'";
	$result = mysqli_query($connection, $query);
	$_SESSION["owner_warehouse_ids"] = mysqli_fetch_all($result, MYSQLI_NUM);
	$num_ids = count($_SESSION['owner_warehose_ids']);

	mysqli_free_result($result);
 ?>
<!-- owner dashboard -->
<html>
	<head>
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Owner Dashboard | Manage Warehouses</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<!-- AJAX -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../style.css"> 

		<!-- javascript click functions -->
		<script src="../javascript/click_functions.js"></script>
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
					<span class="logo-text"><a href="index.php">WhereHouse</a></span>
				</div>
				<div class="flex-logo">
					<span class="header-username">Doe, John</span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>
				</div>
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard" class="sidebar-btn">
						<span class="sidebar-btn-text">Dashboard</span>
					</div>
					<div id="renters" class="sidebar-btn">
						<span class="sidebar-btn-text">Your Renters</span>
					</div>
					<div id="manage-warehouses" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Manage Warehouses</span>
					</div>
					<div id="inbox" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox</span>
					</div>
					<div id="analytics" class="sidebar-btn">
						<span class="sidebar-btn-text">Analytics Portal</span>
					</div>
				</div>
				<div class="page-content">
					<div class="flex-row jc-space-around">
						<h1>Manage Your Warehouses</h1>
						<button type="button" class="btn btn-primary add-warehouse-btn">Add a Warehouse</button>
					</div>
					<div class="warehouse-tiles">
						<?php 
							$index = 0;
							$query = "SELECT address_1, address_2, city, [state], zip, Price_per_skid, sq_footage, cap, Temp_control FROM Warehouse WHERE id = '".$_SESSION['owner_warehouse_ids']."'";
							$result = msqli_query($connection, $query);
							$assoc_array = mysqli_assoc($result);
							$address_1 = $assoc_array["address_1"];
							$address_2 = $assoc_array["address_2"];
							$city = $assoc_array["city"];
							$state = $assoc_array["state"];
							$zip = $assoc_array["zip"];
							$price_per_skid = $assoc_array["Price_per_skid"];
							$sq_footage = $assoc_array["sq_footage"];
							$capacity = $assoc_array["cap"];
							$temp_control = $assoc_array["Temp_control"];
							 
							while($index < $num_ids) {
								$current_warehouse = array("address_1" => $address_1[$index], "address_2" => $address_2[$index], "city" => $city[$index],"state" => $state[$index], "zip" => $zip[$index], "price_per_skid" => $price_per_skid[$index], "sq_footage" => $sq_footage[$index], "capacity" => $capacity[$index], "temp_control" => $temp_control[$index]);
								$index++;
								/*echo " this is the code that will create a new div*/
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">Footer</div>
	</body>

	<script type="text/javascript">
		$("#dashboard").click(function() {
			window.location = "dashboard.php";
		});
		$("#renters").click(function() {
			window.location = "renters.php";
		});
		$("#manage-warehouses").click(function() {
			window.location = "warehouses.php";
		});
		$("#inbox").click(function() {
			window.location = "inbox.php";
		});
		$("#analytics").click(function() {
			window.location = "analytics.php";
		});
		$(".logout-button").click(function() {
			<?php 
				session_destroy();
			?>
			window.location = "../index.php";
		});
	</script>
</html>