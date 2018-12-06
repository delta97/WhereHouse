<!DOCTYPE html>
<!-- owner dashboard -->
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../style.css"> 

		<!-- javascript click functions -->
		<script src="../javascript/click_functions.js"></script>
	<!-- Page Functionality -->
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
					<div id="manage-warehouses" class="sidebar-btn">
						<span class="sidebar-btn-text">Manage Warehouses</span>
					</div>
					<div id="inbox" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Inbox</span>
					</div>
					<div id="analytics" class="sidebar-btn">
						<span class="sidebar-btn-text">Analytics Portal</span>
					</div>
					<div id="account-info" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<!-- Inbox Content -->
				<div class="page-content-inbox">
					<div class="inbox-header">
						<h1>Your Inbox</h1>
					</div>
					<div class="inbox-navbar">
						<div class="inbox-buttons">
							<div id="new-message-btn" class="inbox-btn" data-toggle="modal" data-target="#new-message-modal">
								<span class="inbox-btn-text">New Message</span>
							</div>
							<div id="refresh-btn" class="inbox-btn">
								<span class="inbox-btn-text">Refresh</span>
							</div>
						</div>
						<div class="inbox-search">
							<form class="inbox-search-flex" id="inbox-search" name="inbox-search" method="get">
								<label for="inbox-search-box"><h2 class="search-label">Search: </h2></label>
								<input type="text" class="form-control" name="inbox-search-box"" id="inbox-search-box" placeholder="Search Messages">
							</form>
						</div>
					</div>
					<div class="inbox-container">
						<div class="inbox-title-flex">
							<h2 class="inbox-title">Messages</h2>
						</div>
						<div class="inbox-flex">
							<div id="inbox" class="inbox">
								<table class="table table-striped table-hover">
								  <thead>
								    <tr>
								      <th scope="col">Date</th>
								      <th scope="col">From</th>
								      <th scope="col">Subject</th>
								   
								    </tr>
								  </thead>
								  <tbody class="table-striped">
								  	<tr>
								  		<td scope="col">Hello</td>
								  		<td scope="col">Hello</td>
								  		<td scope="col">Hello</td>
								  	</tr>
								  </tbody>
								</table>
							</div>
						</div>
						<div class="inbox-title-flex">
							<h2 class="inbox-title">Sent Messages</h2>
						</div>
						<div class="inbox-flex">
							<div class="inbox" id="sent-history">
								<table class="table table-striped table-hover">
								  <thead>
								    <tr>
								      <th scope="col">Date</th>
								      <th scope="col">From</th>
								      <th scope="col">Subject</th>
								    </tr>
								  </thead>
								  <tbody class="table-striped">
								  	<tr>
								  		<td scope="col">Hello</td>
								  		<td scope="col">Hello</td>
								  		<td scope="col">Hello</td>
								  	</tr>
								  </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ajax for populating the inbox with messages -->
			<script type="text/javascript">
				$(document).ready(function() {
					$('#refresh-btn').on('click', function(event){
						$.get("update-inbox.php", function(data){

						});
					});
				});
			</script>
			<!-- New Message Modal -->
			<div class="modal fade" id="new-message-modal" tabindex="-1" role="dialog" aria-labelledby="new-message-modal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered flex-center" role="document">
					<div class="modal-content edit-info-modal">
						<div class="modal-header">
							<h4 class="modal-title" id="registration-modal-title">Edit Account Information</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="message-recipient">Message Recipient:</label>
										<input type="text" class="form-control" name="message-recipient" id="message-recipient" placeholder="Message Recipient">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="message-subject">Subject:</label>
										<input type="text" class="form-control" name="message-subject" id="message-subject" placeholder="Subject">
									</div>
								</div>
								<label for="message-body">Message:</label>
								<textarea id="message-body" class="message-body form-control">
								</textarea>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-submit">Send</button>
							<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<!-- Footer -->
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
	<!-- Javascript Functionality -->
	<script type="text/javascript">
		$("#dashboard-btn").click(function() {
			window.location = "dashboard.php";
		});
		$("#rentals-btn").click(function() {
			window.location = "rentals.php";
		});
		$("#requests-btn").click(function() {
			window.location = "requests.php";
		});
		$("#inbox-btn").click(function() {
			window.location = "inbox.php";
		});
		$(".logout-button").click(function() {
			window.location = "../index.php";
			sessionDestroy();
			sessionStorage.clear();
		});
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});
		$('#zip-search').on('click', function(event) {
			window.location = "warehouse-search.php";
		});

		$(document).ready(function(event){
			$('.header-username').text(sessionStorage.getItem("user_last_name")+ ", "+sessionStorage.getItem("user_first_name"));
		});

		function sessionDestroy() {
			$.get('sessiondestroy.php', function(response) {
				console.log(response);
			});
		}



		$('td').on('click', function(event){

		});
	</script>
</html>
