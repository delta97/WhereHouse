<!DOCTYPE html>
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
					<span class="logo-text"><a href="../index.php">WhereHouse</a></span>
				</div>
				<div class="search">
						<input id="zip-search" type="text" class="search-input form-control w-100" placeholder="Search Warehouses By Zipcode" aria-label="Search">
						<button id="zip-search-button" type="button" class="btn btn-dark">Search</button>
					</div>
				<div class="flex-logo">
					<span class="header-username"></span>
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
							<div id="user-name"><b>Name:</b><span id="user-information-first-name"></span>&nbsp;<span id="user-information-last-name"></span></div>
							<div id="user-email"><b>Email:</b><span id="user-information-email"></span></a></div>
							<div id="billing-address"><b>Billing Address:</b> <span id="user-information-address-1"></span>&nbsp;<span id="user-information-address-2"></span>&nbsp;<span id="user-information-city"></span>,&nbsp;<span id="user-information-state"></span>&nbsp;<span id="user-information-zipcode"></span><br></div>
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
			sessionDestroy();
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
		});
		$('#zip-search-button').on('click', function(event) {
			window.location = "warehousesearch.php";
		});
		//my rentals redirect
		$("#user-rentals").on("click", function(event) {
			window.location = "rentals.php";
		});




		$(document).ready(function(event){
			//populate the user infromation tile on the dashboard 
			$.ajax({
				url:'dashboard_onload.php',
				type: 'post', 
				dataType: 'json',
				success: function(response) {
					var first_name = response['first_name'];
					var last_name = response['last_name'];
					var email = response['email'];
					var address_1 = response['address_1'];
					var address_2 = response['address_2'];
					var city = response['city'];
					var state = response['state'];
					var zipcode = response['zipcode'];

					if(address_2 = null) {
						address_2 = "";
					}
					$('#user-information-first-name').text(first_name);
					$('#user-information-last-name').text(last_name);
					$('#user-information-email').text(email);
					$('#user-information-address-1').text(address_1);
					$('#user-information-address-2').text(address_2);
					$('#user-information-city').text(city);
					$('#user-information-state').text(state);
					$('#user-information-email').text(zipcode);
					$('.header-username').text("Welcome, "+first_name);

				}
			});	
			//populate the sidebar with notification icons as needed
			get_notification_badges();

	});




		//function that populates the sidebar with notification icons
		function get_notification_badges() {

			$.ajax({
				url: 'get_notification_badges.php',
				type:'post',
				dataType: 'JSON',
				succcess: function(response) {
					var num_unchecked_messages = response['num_unchecked_messages'];
					var num_rentals = response['num_rentals'];
					var num_requests = response['num_requests'];
					console.log(response);
					console.log(num_unchecked_messages, num_rentals, num_requests);
					$('.notification-span-rentals').text(num_rentals);
					$('.notification-span-requests').text(num_requests);
					$('.notification-span-messages').text(num_unchecked_messages);

				}
			});
		}
		function sessionDestroy() {
			$.get('sessiondestroy.php', function(response) {
				console.log(response);
			});
		}

	</script>
</html>
