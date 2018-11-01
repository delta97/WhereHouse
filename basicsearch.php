<!DOCTYPE html>
<html>
	<head>
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Wherehouse | Home</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<!-- AJAX -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- font awesome icons -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">


		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="style.css"> 
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="index.php"><img class="logo" src="./images/logo.png"></a></span>
				</div>
				<div class="search">
					<input id="zip-search" type="text" class="search-input form-control w-100" placeholder="Search Warehouses By Zipcode" aria-label="Search">
					<button id="zip-search-button" type="button" class="btn btn-dark">Search</button>
				</div>
				<div class="flex-logo">
					<div class="login-button" id="login" data-toggle="modal" data-target="#login-modal"><span class="login-button-text">Log in</span></div>
					<div class="login-button" id="register" data-toggle="modal" data-target="#registration-modal"><span class="login-button-text">Register</span></div>
				</div>
			</div>
			<div class="nav">
				<div class="flex-logo">
					<span class="logo-text"><a href="index.php">WhereHouse</a></span>
				</div>
				<span id="home" class="navbar-item"><a href="index.php">Home</a></span>
				<span id="about" class="navbar-item"><a href="./home/about.php">About</a></span>
				<span id="FAQ" class="navbar-item"><a href="./home/FAQ.php">FAQ</a></span>
			</div>
			<div class="search-body no-space search-flex">
				<div class="search-header"><?php echo "Search For: " . $_SESSION["search_zipcode"]; ?> <!--the sessionStorage variable searchQuery is being shown here--></div>
				<div class="search-filter-options">
					<form class="form-inline">
						<label class="my-1 mr-2" for="wh-search-options"><b>Search Options</b></label>
						<select class="custom-select my-1 mr-sm-2" id="wh-search-options">
							<option selected>Distance Ascending</option>
							<option>Distance Descending</option>
							<option>Price Ascending</option>
							<option>Price Descending</option>
						</select>
					</form>
				</div>
				<div class="search-container">
					<div class="search-item">
						Warehouse 1
					</div>
				</div>
			</div>
			<!-- registration modal -->
				<div class="modal fade" id="registration-modal" tabindex="-1" role="dialog" aria-labelledby="registration-modal-title" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-formatting">
							<div class="modal-header">
								<h4 class="modal-title" id="registration-modal-title">Are you leasing or renting through WhereHouse?</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group flex-center">
										<button value="0" type="button" class="btn btn-next" id="btn-register-lessee">I want to lease a warehouse</button>
	   									<button value="1" type="button" class="btn btn-next" id="btn-register-owner">I want to rent my warehouse</button>
									</div>
								</form>
							</div>
							<div class="modal-footer">
   								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
 							</div>
						</div>
					</div>
				</div>
			<!-- Login Modal -->
				<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-title" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-formatting">
							<div class="modal-header">
								<h4 class="modal-title" id="login-modal-title">Existing User? Login</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
								    	<label for="login-modal-email">Email address</label>
								    	<input type="text" class="form-control" id="login-modal-email" aria-describedby="enterEmail" placeholder="Enter email">
								  	</div>
								  	<div class="form-group">
								    	<label for="login-modal-password">Password</label>
								    	<input type="password" class="form-control" id="login-modal-password" placeholder="Password">
								  </div>
							</div>
							<div class="modal-footer">
   								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
   								<button type="button" class="btn btn-next" id="btn-login-lessee">Log In Lessee</button>
   								<button type="button" class="btn btn-next" id="btn-login-owner">Log In Owner</button>
 							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">Footer</div>
		</div>
	</body>
	<script type="text/javascript">
		//add the "searchQuery" 
		$(document).ready(function() {
			var searchQuery = sessionStorage.getItem("searchQuery");
			$("#zip-search").val(searchQuery);
			$(".search-header").text("Search For: " + searchQuery);
		});

		//login and registration buttons and modals
		$("#btn-login-lessee").on('click touch', function() {
			window.location = "lessee/dashboard.php";
		});
		$("#btn-login-owner").on('click touch', function() {
			window.location = "owner/dashboard.php";
		});
		$("#btn-register-owner").on('click touch', function() {
			window.location = "./home/registration/owner-registration.php"; 
			sessionStorage.setItem("user_type", "1"); //user_type is set to 1 for owners
		});
		$("#btn-register-lessee").on('click touch', function() {
			window.location = "./home/registration/lessee-registration.php";
			sessionStroage.setItem("user_type", "0"); //user_type is set to 0 for lessees
		});



		$("#zip-search").on("focusout", function(event){
			var search_value = $("#zip-search").val();
			sessionStorage.setItem("searchQuery", search_value);
			<?php 
				session_start();
				$_SESSION["search_zipcode"] = $_GET["zip-search"];
			?>
			console.log(sessionStorage.getItem("searchQuery"));
		});

		//when the zip-search button is clicked
		$("#zip-search-button").on("click", function(event) {
			$(".search-header").text("Search For: " + search_value);
		});
	</script>
</html>


















