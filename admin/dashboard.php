
<!DOCTYPE html>
<!-- Admin -->
<html>
	<head>
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

		<title>WhereHouse | Admin Dashboard</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	
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
				<div class="flex-logo">
					<span class="header-username">Welcome, ADMIN</span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>
				</div>
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Analytics</span>
					</div>
					<div id="lessees" class="sidebar-btn">
						<span class="sidebar-btn-text">Lessees</span>
					</div>
					<div id="owners" class="sidebar-btn">
						<span class="sidebar-btn-text">Owners</span>
					</div>
					<div id="warehouses" class="sidebar-btn">
						<span class="sidebar-btn-text">Warehouses</span>
					</div>
					<div id="messages" class="sidebar-btn">
						<span class="sidebar-btn-text">Messages</span>
					</div>
					<div id="account-settings" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Settings</span>
					</div>
				</div>
				<!-- Page Content Begins Here -->
				<div class="page-content">
					<div class="flex-space-between flex-align-start2">
						<h1> Admin Portal</h1>
						<span class="service2">
							<!-- Replaced with the user's actual name -->
							<h1 id="user_first_last_name">Administrator</h1>
							<!-- Replaced with the user's actual email -->
							<h5 id="user_email">admin@warehouse.com</h5>	
						</span>
						<span class="service2">
							<h5><b>Today's Date: </b> <?php echo date("m/d/Y") ?></h5>
							<h5><b>Login Time: </b><span id="timestamp"></span></h5>
						</span>
					</div>
					
					<!-- Begin Connection of Analytics -->	
						<div class="userbox2">
							<h1>Full Site Review</h1>
							<?php
								require "serverconnect.php";

								$conn = serverConnect();
								// Check connection
								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								} 
										
									//--Registration--
									$sql = "SELECT owner_id FROM Owner";
									$result = $conn->query($sql);
									$count_result = mysqli_num_rows($result);
									
									echo "<h4 style='text-align:center'>Registration</h4><b>Total Registered Owners: </b>" . $count_result . " <br>";
									
									$sql = "SELECT lessee_id FROM Lessee";
									$result = $conn->query($sql);
									$count_result = mysqli_num_rows($result);
									
									echo "<b>Total Registered Lessees: </b>" . $count_result . " <br><br>";
									
									
									//--Warehouses--								
									$sql = "SELECT warehouse_id FROM Warehouse";
									$result = $conn->query($sql);
									$count_result = mysqli_num_rows($result);
									
									echo "<h4 style='text-align:center'>Warehouses</h4><b>Total Warehouses: </b>" . $count_result . " <br>";
									
									$sql = "SELECT AVG(weighted_average_rating) FROM Warehouse";
									$result = $conn->query($sql);
									$avg_result = mysqli_fetch_array($result, MYSQLI_BOTH);
									
									echo "<b>Average Warehouse Rating: </b>" . round($avg_result[0],2) . "<br>";
									
									$sql = "SELECT AVG(price_per_skid) FROM Warehouse";
									$result = $conn->query($sql);
									$avg_result = mysqli_fetch_array($result, MYSQLI_BOTH);
									
									echo "<b>Average Price-per-Skid: $</b>" . round($avg_result[0],2) . "<br><br>";
									
									
									//--Contracts--
									$sql = "SELECT status FROM Contract WHERE status='Declined'";
									$result = $conn->query($sql);
									$num_declined = mysqli_num_rows($result);
									
									$sql = "SELECT status FROM Contract WHERE status='Pending'";
									$result = $conn->query($sql);
									$num_pending = mysqli_num_rows($result);
									
									$sql = "SELECT status FROM Contract";
									$result = $conn->query($sql);
									$num_total = mysqli_num_rows($result);
									
									$acceptance_rate = round(100 * $num_pending / ($num_total - $num_pending), 2);
									echo "<h4 style='text-align:center'>Contracts</h4><b>Contract Acceptance Rate: </b>" . $acceptance_rate . " %<br>";
									
									$sql = "SELECT status FROM Contract WHERE status='Active'";
									$result = $conn->query($sql);
									$num_active = mysqli_num_rows($result);
									
									echo "<b>Pending Contracts: </b>" . $num_pending . "<br>";
									echo "<b>Active Contracts: </b>" . $num_active . "<br>";
									
									$sql = "SELECT status FROM Contract WHERE status='Terminated'";
									$result = $conn->query($sql);
									$num_term = mysqli_num_rows($result);
									
									echo "<b>Terminated Contracts: </b>" . $num_term . "<br><br>";
									
									echo "<h4 style='text-align:center'>Analytics</h4><br>";
									
									
								$conn->close();
							?>
							
							<div class="graphic">
								<!-- Shiny Plots -->
								<iframe src="https://ie332group8.shinyapps.io/mastershinyapp/ " width="80%", height="500">
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
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
					<a href="https://www.instagram.com/wherehouse.8.inc/"><i class="fab fa-instagram"></i></a>
					<!-- Add a link to instagram... replace # with actual links> -->
				</div>
			</div>
		</footer>


	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(timestamp, 1000);
		})

		$("#warehouses").click(function() {
			window.location = "warehouses.php";
		});
		$("#owners").click(function() {
			window.location = "owners.php";
		});
		$("#lessees").click(function() {
			window.location = "lessees.php";
		});
		$("#inbox").click(function() {
			window.location = "inbox.php";
		});
		$("#dashboard").click(function() {
			window.location = "dashboard.php";
		});
		$(".logout-button").click(function() {
			window.location = "../index.php";
			sessionStorage.clear();
			sessionDestroy();
		});
		$("#account-settings").click(function(event) {
			window.location = "account_info.php";
		});


		function timestamp() {
	    $.ajax({
	        url: '../time.php',
	        success: function(data) {
	            $('#timestamp').html(data);
	        },
	    });
}
	</script>
</html>
