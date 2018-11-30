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

		<title>Wherehouse | My Space Rentals</title>

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
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
					<span class="logo-text"><a href="../index.php">WhereHouse</a></span>
				</div>
				<div class="flex-logo">
					<span class="header-username">Doe, John</span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>
				</div>
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Dashboard</span>
					</div>
					<div id="rentals-btn" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Your Rentals</span>
					</div>
					<div id="requests-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Manage Requests</span>
					</div>
					<div id="inbox-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox</span>
					</div>
					<div id="account-info" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<div class="page-content-inbox">
					<div class="current-rentals">
						<h1 style="text-align: center;">Current Rentals</h1>
						<?php include "get_current_rentals_tables.php";?>


					</div>

					<!-- <?php 
						//query the open rental contracts 
						//if query returns number of results equal to zero then do the following:

						//echo "Oh no, you don't have any current rentals! You can fix that by searching for a warehouse to rent on our <a href="searchpage.html">search page</a>."
					?> -->
					<div class="past-rentals">
						<h1 style="text-align: center;">Past Rentals</h1>
						<?php include "get_past_rentals_tables.php";?>
					</div>
					
				</div>
			</div>

			<!-- Rental View Details Modal - Pops up on clicking one of the past or current rentals -->
			<div class="modal fade" id="rental-view-details" tabindex="-1" role="dialog" aria-labelledby="rental-view-details" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered flex-center" role="document">
					<div class="modal-content edit-info-modal">
						<div class="modal-header">
							<h3 class="modal-title" id="registration-modal-title">Rental Details</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
							<button type="button" data-dismiss="modal" data-toggle="modal" data-target="#rent-again" class="btn btn-info">Rent Again</button>
							<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>


			<!-- Rent Again Modal -->
			<div class="modal fade" id="rent-again" tabindex="-1" role="dialog" aria-labelledby="rent-again" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered flex-center" role="document">
					<div class="modal-content edit-info-modal">
						<div class="modal-header">
							<h3 class="modal-title" id="registration-modal-title">Rent Again</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
						</div>
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
		$("#dashboard-btn").on('click', function(event) {
			window.location = "./dashboard.php";
		});
		$("#rentals-btn").click(function(event) {
			window.location = "./rentals.php";
		});
		$("#requests-btn").click(function(event) {
			window.location = "./requests.php";
		});
		$("#inbox-btn").click(function(event) {
			window.location = "./inbox.php";
		});
		$(".logout-button").click(function(event) {
			window.location = "../index.php";
			<?php session_destroy();?>
		});
		$("#account-info").click(function(event) {
			window.location = "./account_info.php";
		});
	</script>
</html>
