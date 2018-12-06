<?php
session_start();
?>

<!DOCTYPE html>
<!-- owner dashboard -->
<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130199470-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-130199470-1');
		</script>
		<meta http-equiv="Pragma" content="no-cache">
		<META HTTP-EQUIV="Expires" CONTENT="-1">
		<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">	
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
		<!-- 3rd party footer content -  -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<title>Wherehouse | Owner Dashboard</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../style.css"> 
		<link  rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
					<span class="logo-text"><a href="index.php">WhereHouse</a></span>
				</div>
				<div class="flex-logo">
					<span class="header-username">[Last Name], [First Name]</span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>
				</div>
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Dashboard</span>
					</div>
					<div id="renters" class="sidebar-btn">
						<span class="sidebar-btn-text">Your Renters <span class="notification-span-requests"></span></span>
					</div>
					<div id="manage-warehouses" class="sidebar-btn">
						<span class="sidebar-btn-text">Manage Warehouses</span>
					</div>
					<div id="inbox" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox <span class="notification-span-messages"></span></span>
					</div>
					<div id="analytics" class="sidebar-btn">
						<span class="sidebar-btn-text">Analytics Portal</span>
					</div>
					<div id="account-info" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				
				
<!-- Page Content Begins Here -->
	<!-- User Information Header -->			
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

	<!-- Intro Text -->
				<div class="userbox2">
					<p>Make the most of your warehouse space by tailoring to the continuously expanding community of users! Compare where WhereHouse users are located, and learn about how you can maximize your revenue through the assortment of analytics provided to you as a WhereHouse certified owner.</p>
				</div>				
				
	<!-- Your Warehouses -->			
				<div class="userbox2">
					<h1>Your Warehouses </h1>
					<?php
					
					$servername = "mydb.ics.purdue.edu";
					$username = "g1090429";
					$password = "WhereHouse?";
					$dbname = "g1090429";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
						$user_id = $_SESSION['user_id'];			
						$sqlWH = "SELECT owner_id, address_1, zipcode, state, weighted_average_rating, number_of_ratings, city, warehouse_id FROM Warehouse WHERE owner_id = $user_id";
						$resultWH = $conn->query($sqlWH);
						if ($resultWH->num_rows > 0) {
							// output data of each row
							while($row = $resultWH->fetch_assoc()) {
								echo "<b>Address: </b>" . $row["address_1"]. ", " . $row["city"]. ", " . $row["state"].  " " . $row["zipcode"]. "<br>" . "<b>Your WhereHouse Inc. ID: </b> " . $row["warehouse_id"]. " <br>" . "<b>Average Rating: </b>" . $row["weighted_average_rating"]. " out of 5 stars. <br>" . $row["number_of_ratings"]. " users have rented space in this property! " . "<br>" . "<br>";
							}
						} else {
							echo "0 results";
						}						
					$conn->close();
					?>
				</div>				

<!-- Shiny App -->
				<div class="userbox2">
				<h1>See How Users of WhereHouse Inc. Stack Up</h1>
				<div class="graphic">
				<iframe src="https://ie332group8.shinyapps.io/mastershinyapp/ ", width="80%", height="500">
				</iframe>
				</div>
				</div>				
								
	


				

				</div>
			</div>
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
					<a href="https://www.facebook.com/kayla.parker.90260403"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
					<a href="https://www.instagram.com/wherehouse.8.inc/"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
		</footer>


	<script type="text/javascript">

		$(document).ready(function(event){
			var user_last_name = sessionStorage.getItem("user_last_name");
			var user_first_name = sessionStorage.getItem("user_first_name");
			var user_email = sessionStorage.getItem("user_email");
			var user_id = sessionStorage.getItem("user_id");

			$('.header-username').text(user_last_name+", "+user_first_name);
			$('#user_first_last_name').text(user_first_name + " " + user_last_name);
			$('#user_email').text(user_email);
			get_notification_badges();


		});

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
			sessionStorage.clear();
			sessionDestroy();

		});
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});


		//calls a get to destory the php variable session
		function sessionDestroy() {
			$.get('sessiondestroy.php', function(response) {
				console.log(response);
			});
		}

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
	</script>
</html>
