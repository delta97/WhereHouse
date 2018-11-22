<!DOCTYPE html>
<!-- owner dashboard -->
<?php
	include "../serverconnect.php";

	$connection = serverConnect();
	$query = "SELECT first_name, last_name FROM User WHERE email = '".$_SESSION['user_email']."'";
	$result = mysqli_query($connection, $query);

	if($result) {
		$assoc_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
		$_SESSION['user_first_name'] = $assoc_array['first_name'];
		$_SESSION['user_last_name'] = $assoc_array['last_name'];
	}
	else {
		echo"<script>console.log('There was an error retrieving data from the database');</script>";
	}
	
	mysqli_free_result($result);
	mysqli_close($connection);


?>
<html>
	<head>
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Wherehouse | Lessee Dashboard</title>

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
					<span class="header-username"><?php echo "'".$_SESSION['user_last_name']."', '".$_SESSION['user_first_name']."'";?></span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>
				</div>
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Dashboard</span>
					</div>
					<div id="renters" class="sidebar-btn">
						<span class="sidebar-btn-text">Your Renters</span>
					</div>
					<div id="manage-warehouses" class="sidebar-btn">
						<span class="sidebar-btn-text">Manage Warehouses</span>
					</div>
					<div id="inbox" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox</span>
					</div>
					<div id="analytics" class="sidebar-btn">
						<span class="sidebar-btn-text">Analytics Portal</span>
					</div>
					<div id="account-info" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<div class="page-content">
					<h1>Dashboard</h1>
					<div class="flexbox-dashboard">
						<div id="rentals-over-time">
							<div class="rentals-over-time-chart">
								Chart Goes Here
							</div>
							<div class="selection-buttons">
								<button type="button" class="btn selection-btn">Warehouse 1</button>
								<button type="button" class="btn selection-btn">Warehouse 2</button>
							</div>
						</div>

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
			
			window.location = "../index.php";
		});
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});
	</script>
</html>