<!DOCTYPE html>
<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
		<!-- 3rd party footer content -  -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

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
					<button id="zip-search" class="search-button-home" aria-label="Search"><span class="login-button-text">Search Available Warehouses by Zipcode</span></button>
				</div>
				<div class="flex-logo">
					<span class="header-username">[Last Name], [First Name]</span>
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
			
			
			<!-- Begin Page Content -->
			<div class="page-content">
				<div class="flex-space-between flex-align-start2">
					<span class="service2">
						<img src='https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortWaved&accessoriesType=Wayfarers&hairColor=BrownDark&facialHairType=BeardLight&facialHairColor=Blonde&clotheType=Hoodie&clotheColor=Gray01&eyeType=Close&eyebrowType=UnibrowNatural&mouthType=Smile&skinColor=Yellow' style="width:100pt"/>			
					</span>
					<span class="service2">
						<!-- Replaced with the user's actual name -->
						<h1 id="user_first_last_name"></h1>
						<!-- Replaced with the user's actual email -->
						<h5 id="user_email"></h5>	
					</span>
					<span class="service2">
						<h5><b>Today's Date:</b> <?php echo date("m/d/Y") ?></h5>
						<h5><b>Login Time:</b> <?php echo date("h:i"); ?></h5>
					</span>
				</div>		
				<div class="userbox2">
					<div class="attribute">
						<div class="dashboard-tile-header">User Information</div>		
						<div class="dashboard-tile-content">
							<div id="user-name"><b>Name: </b><span id="user-information-first-name"></span>&nbsp;<span id="user-information-last-name"></span></div>
							<div id="user-email"><b>Email: </b><span id="user-information-email"></span></a></div>
							<div id="billing-address"><b>Billing Address:</b> <span id="user-information-address-1"></span>&nbsp;<span id="user-information-address-2"></span>&nbsp;<span id="user-information-city"></span>,&nbsp;<span id="user-information-state"></span>&nbsp;<span id="user-information-zipcode"></span><br></div>
							<div class="dashboard-btn-flex">
								<button class="btn btn-primary dashboard-tile-edit" id="edit-information">Edit</button>
							</div>	
						</div>		
					</div>
	
					<div class="attribute">
						<div class="dashboard-tile-header">Your Rentals</div>
						<div id="rented-warehouses" class="dashboard-tile-content">
							
						</div>
					</div>
				</div>
		
				<div class="userbox2">
				<div class="attribute">
					<div class="dashboard-tile-header">Warehouse Search Tailored For You!</div>
					<div class="dashboard-tile-content">
						<div class="personalized-search-results">Result 1</div>
					</div>
				</div>
				<div class="attribute">
					<div class="dashboard-tile-header">Pending Requests</div>
					<div id="pending-requests"class="dashboard-tile-content">
						
					</div>
				</div>
				</div>
			</div>
			<!-- Page Content Ends Here -->
			
			
			
		</div>
	</body>
	<footer style="margin-top: 0px;"class="footer-distributed">

			<div class="footer-left">
				<span class="company-name">WhereHouse INC. </span> <br>
				<p class="footer-company-name">IE332 Team Project &copy; 2018</p>
			</div>
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>610 Purdue Mall</span> West Lafayette, IN 47907</p>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					<p>+1 555 123 4567</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:wherehouse.8.inc@gmail.com">wherehouse.8.inc@gmail.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>Connect With Us</span>
					Keep up to date with innovations happening at WhereHouse Inc. by connecting with us on our socials! 
				</p>
				<div class="footer-icons">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
					<a href="https://www.instagram.com/wherehouse.8.inc/"><i class="fab fa-instagram"></i></a>
					<!-- Add a link to instagram... replace # with actual links> -->
				</div>
			</div>
		</footer>

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
			sessionStorage.clear(); //clears javascript session information
		});
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});
		$('#edit-information').on('click', function(event){
			window.location = "account_info.php";
		});
		

		$('#zip-search').on('click', function(event) {
			window.location = "warehouse-search.php";
		});

		//my rentals redirect
		$("#user-rentals").on("click", function(event) {
			window.location = "rentals.php";
		});

		$(document).ready(function(event){
			$('.header-username').text(sessionStorage.getItem("user_last_name")+ ", "+sessionStorage.getItem("user_first_name"));
			//populate the user infromation tile on the dashboard 
			$.ajax({
				url:'dashboard_onload.php',
				type: 'post', 
				dataType: 'json',
				data: {user_id: sessionStorage.getItem("user_id")},
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
					$('#user_first_last_name').text(first_name + " " + last_name);
					$('#user_email').text(email);
					$('#user-information-first-name').text(first_name);
					$('#user-information-last-name').text(last_name);
					$('#user-information-email').text(email);
					$('#user-information-address-1').text(address_1);
					$('#user-information-address-2').text(address_2);
					$('#user-information-city').text(city);
					$('#user-information-state').text(state);
					$('#user-information-zipcode').text(zipcode);

					//setting session items for values not initialized in the login
					sessionStorage.setItem("user_address_1", address_1);
					sessionStorage.setItem("user_address_2", address_2);
					sessionStorage.setItem("user_city", city);
					sessionStorage.setItem("user_state", state);
					sessionStorage.setItem("user_zipcode", zipcode);
				}
			});	

			//call to populate the rentals and requests

			$.ajax(console.log("ajax called"),{
				url:'dashboard_requests_rentals.php',
				type:'post',
				dataType: 'json',
				data: {user_id: sessionStorage.getItem('user_id')},
				success: function(response){
					console.log(response);
					var warehouse_name_pending = response['warehouse_name_pending'];
					var warehouse_name_active = response['warehouse_name_active'];
					var warehouse_id_pending = response['warehouse_id_pending'];
					var num_pending = warehouse_id_pending.length;
					var owner_id_pending = response['owner_id_pending'];
					var contract_start_pending = response['contract_start_pending'];
					var contract_end_pending = response['contract_end_pending'];
					var warehouse_id_active = response['warehouse_id_active'];
					var num_active = warehouse_id_active.length;
					var owner_id_active = response['owner_id_active'];
					var contract_start_active = response['contract_start_active'];
					var contract_end_active = response['contract_end_active'];
					console.log(typeof(warehouse_name_pending));
					console.log(warehouse_name_pending);

					//adds elements to the active rentals div
					for(var x = 0; x < num_active; x++){
						$('#rented-warehouses').append("<div class='rented-warehouse'><table><tr><td><b>Warehouse Name: </b></td><td>"+warehouse_name_active[x]+"</td></tr><tr><td><b>Warehouse ID: </b></td><td>"+warehouse_id_active[x]+"</td></tr><tr><td><b>Owner ID</b></td><td>"+owner_id_active[x]+"</td></tr><tr><td><b>Contract Start Date:</b></td><td>"+contract_start_active[x]+"</td></tr><tr><td><b>Contract End Date:</b></td><td>"+contract_end_active[x]+"</td></tr></table></div>");
					}

					//adds elements to the pending requests div
					for(var x = 0; x < num_pending; x++){
						$('#pending-requests').append("<div class='rented-warehouse'><table><tr><td><b>Warehouse Name:</b></td><td>"+warehouse_name_pending[x]+"</td></tr><tr><td><b>Warehouse ID:</b></td><td>"+warehouse_id_pending[x]+"</td></tr><tr><td><b>Owner ID:</b></td><td>"+owner_id_pending[x]+"</td></tr><tr><td><b>Contract Start Date:</b></td><td>"+contract_start_pending[x]+"</td></tr><tr><td><b>Contract End Date:</b></td><td>"+contract_end_pending[x]+"</td></tr></table></div>");
					
					}
					//changes the inner text of the name element to the user's first and last name
					$('#user_first_last_name').text(first_name + " " + last_name);
					//changes the inner text of the email to the user's email
					$('#user_email').text(email);

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
