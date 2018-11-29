<!DOCTYPE html>
<!-- checks information on all pages to see if there is anything new that needs to be brought to the user's attention (new messages, request status cheanges, etc) -->
<script>check_for_updates(<?php $_SESSION['user_email']?>);</script>
<?php
	require "serverconnect.php";
	$connection = serverConnect();
	$user_id = $_SESSION['user_id'];

	$query = "SELECT COUNT(message_id) FROM Messages WHERE recipient_id = '$user_id';";
	$result = mysqli_query($connection, $query);

	$associative_array = mysqli_fetch_array($result, MYSQLI_NUM);
	$_SESSION['num_messages'] = $associative_array[0];
	if($_SESSION['num_messages'] > 0) {
		echo"<script> $('.notification-icon').text('".$num_messages."');</script>"; //adds the number of messages as an icon over the inbox navbar button
	}


?>
<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../style.css"> 

		
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
					<span class="logo-text"><a href="index.php">WhereHouse</a></span>
				</div>
				<div class="search">
						<input id="zip-search" type="text" class="search-input form-control w-100" placeholder="Search Warehouses By Zipcode" aria-label="Search">
						<button id="zip-search-button" type="button" class="btn btn-dark">Search</button>
					</div>
				<div class="flex-logo">
					<span class="header-username">Welcome, <?php print($_SESSION['user_first_name'])?></span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>
				</div>
				
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard-btn" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Dashboard</span>
					</div>
					<div id="rentals-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Your Rentals<span class="notification-span-rentals"></span>
					</div>
					<div id="requests-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Manage Requests<span class="notification-span-requests"></span>
					</div>
					<div id="inbox-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox<span class="notification-span-messages"></span>
						
					</div>
					<div id="account-info" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<div class="page-content flexbox-dashboard">
					<div id="user-information" class="dashboard-tile">
						<div class="dashboard-tile-header">User Information</div>		
						<div class="dashboard-tile-content">
							<div id="user-name"><b>Name:</b> John Doe</div>
							<div id="user-email"><b>Email:</b> <a href="mailto:jdoe@purdue.edu">jdoe@purdue.edu</a></div>
							<div id="billing-address"><b>Billing Address:</b> 400 McCutcheon Dr.<br>West Lafayette, IN 47906</div>
							<div id="user-phone-num"><b>Phone Number:</b> (123) 456-7890</div>
							<div id="user-rating"><b>User Rating:</b> -6 Stars</div>
							<div id=""></div>
							<div class="dashboard-btn-flex">
								<button class="btn btn-primary dashboard-tile-edit" id="edit-information">Edit</button>
							</div>
						</div>
					</div>
					<div id="user-rentals" class="dashboard-tile dashboard-tile-clickable">
						<div class="dashboard-tile-header">Your Rentals</div>
						<div class="dashboard-tile-content">
							<div id="warehouse-1" class="rented-warehouse">
								<span><b>Warehouse Name</b></span> <br>
								&nbsp; &nbsp;<span id="contract-from-1"><b>From: </b>August 23</span> <br>
								&nbsp; &nbsp;<span id="contract-to-1"><b>To: </b> September 14</span>
							</div>
						</div>
					</div>
					<div id="personalized-search" class="dashboard-tile dashboard-tile-clickable">
						<div class="dashboard-tile-header">Warehouse Search Tailored For You!</div>
						<div class="dashboard-tile-content">
							<div class="personalized-search-results">Result 1</div>
						</div>
					</div>
					<div id="current-requests" class="dashboard-tile dashboard-tile-clickable">
						<div class="dashboard-tile-header">Pending Requests</div>
						<div class="dashboard-tile-content">
							<div id="request-1"><b>Warehouse Name</b></div>
							<div id="request-1-date">August 16, 2018</div>
							<div id="request-time">8:52 PM</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">Footer</div>
	</body>

	<script type="text/javascript">
		$("#dashboard-btn").click(function(event) {
			window.location = "dashboard.php";
		});
		$("#rentals-btn").click(function(event) {
			window.location = "rentals.php";
		});
		$("#requests-btn").click(function(event) {
			window.location = "requests.php";
		});
		$("#inbox-btn").click(function(event) {
			window.location = "inbox.php";
		});
		$(".logout-button").click(function(event) {
			window.location = "../index.php";
		});
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});
		$('#edit-information').on('click', function(event){
			window.location = "account_info.php";
		});

		//search field actions
		$('#zip-search').on('focusout', function(event) {
			var searchQuery = $('#zip-search').val();
			if(searchQuery == null || searchQuery == ""){
				searchQuery = "Oops...you forgot to enter a zipcode to search";
			}
			sessionStorage.setItem("searchQuery", searchQuery);
		});
		$('#zip-search-button').on('click', function(event) {
			sessionStorage.setItem("searchQuery", searchQuery);
			window.location = "warehousesearch.php";
		});







		//my rentals redirect
		$("#user-rentals").on("click", function(event) {
			window.location = "rentals.php";
		});


		console.log(<?php print($_SESSION['first_name']);?>);

		//ajax script to retrieve information about a user when they click the edit button
		$('#edit-information').on('click', function(event) {
			$.ajax({
				method: 'GET', 
				type: 'GET', 
				url: 'get_user_information.php', 
				success: function (response) {
					
				}
			});
		});


		function check_for_updates(email) {
			$.ajax({
				url: 'check_for_updates.php',
				data: email,
				dataType: 'json',
				success: function(response){
					var response_data = JSON.parse(response);
					var num_unchecked_messages = response_data.num_unchecked_message;
					var num_requests = response_data.num_requests;
					var num_rentals = response_data.num_rentals;

					if(num_unchecked_messages > 0) {
						$("#notification-span-messages").html("<span class=\"notification-icon\">"+num_unchecked_messages+"</span>");
					}
					if(num_requests > 0){
						$("#notification-span-requests").html("<span class=\"notification-icon\">"+num_requests+"</span>");
					}
					if(num_rentals > 0) {
						$("#notification-span-rentals").html("<span class=\"notification-icon\">"+num_rentals+"</span>");
					}
				}

			});
		}
	</script>
</html>
