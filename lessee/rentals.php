<!DOCTYPE html>
<html>
	<head>
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
				</div>
				<div class="page-content">
					<div class="current-rentals">
						<h1 style="text-align: center;">Current Rentals</h1>
						<table id="current-rentals-table" class="table">
							<thead>
								<tr>
									<th style="width: 25%" class="text-center" scope="col">
										Warehouse Rented
									</th>
									<th style="width: 25%" class="text-center" scope="col">
										Rental Duration
									</th>
									<th style="width: 25%" class="text-center" scope="col">
										Cost Total
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="width: 25%" class="text-center">
										1st Warehouse Rented From Server
									</td>
									<td style="width: 25%" class="text-center">
										Date Range From Server
									</td>
									<td style="width: 25%" class="text-center">
										Cost Total From Server
									</td>
								</tr>
							</tbody>
						</table>


					</div>

					<!-- <?php 
						//query the open rental contracts 
						//if query returns number of results equal to zero then do the following:

						//echo "Oh no, you don't have any current rentals! You can fix that by searching for a warehouse to rent on our <a href="searchpage.html">search page</a>."
					?> -->
					<div class="past-rentals">
						<h1 style="text-align: center;">Past Rentals</h1>
						<table id="past-rentals-table" class="table">
							<thead>
								<tr>
									<th style="width: 25%" class="text-center" scope="col">
										Warehouse Rented
									</th>
									<th style="width: 25%" class="text-center" scope="col">
										Rental Duration
									</th>
									<th style="width: 25%" class="text-center" scope="col">
										Cost Total
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="width: 25%" class="text-center">
										1st Warehouse Rented From Server
									</td>
									<td style="width: 25%" class="text-center">
										Date Range From Server
									</td>
									<td style="width: 25%" class="text-center">
										Cost Total From Server
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- <?php
						//query the history of the user for ALL rentals over time
						//display results in a table 

						//on click for each result, toggle a modal that displays the information surrounding a particular rental

						//possible feature if there is time: add a print to pdf button that prints and downloads a pdf of the rental in question

						//fields to include in modal: warehouse rented, duration, final cost, rating the user gave the warehouse, average rating for the warehouse, search for this result again button
					?> -->
				</div>
			</div>
			<div class="modal fade" id="edit-information-modal" tabindex="-1" role="dialog" aria-labelledby="edit-information-modal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered flex-center" role="document">
					<div class="modal-content edit-info-modal">
						<div class="modal-header">
							<h4 class="modal-title" id="registration-modal-title">Rental</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-submit">Submit</button>
								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
							</div>
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
	</script>
</html>