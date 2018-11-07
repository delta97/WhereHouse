
<!DOCTYPE html>
<html>
	<head>
		<link rel="preload" href="./images/warehouse2.jpeg">

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
					<input id="zip-search" name="zip-search" type="text" class="search-input form-control w-100" placeholder="Search Warehouses By Zipcode" aria-label="Search">
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
			<div class="body no-space">
				<div class="container-fluid no-space">
					<div class="row no-space">
						<div rel="preload" class="no-space background-image"></div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<div class="main-page-slogan">
								<h1 class="slogan-title">Bringing Modern Flexibility to the Warehousing Industry</h1>
								<h4 class="slogan-content">Quickly scale your storage needs when you're short on space. <br>Optimize your capital utilization rates when you're not. <br>All without long term capital investment. <br>That's the <span class="company-name">WhereHouse</span> difference.</h4>
							</div>
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
								<form method="post">
									<div class="form-group">
								    	<label for="login-modal-email">Email address</label>
								    	<input type="text" name="login-modal-email" class="form-control" id="login-modal-email" aria-describedby="enterEmail" placeholder="Enter email">
								  	</div>
								  	<div class="form-group">
								    	<label for="login-modal-password">Password</label>
								    	<input name="login-modal-password" type="password" class="form-control" id="login-modal-password" placeholder="Password">
								  </div>
								</form>
								
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
		$("#home").on('click touch', function(event) {
			window.location = "index.php";
		});
		$("#about").on('click touch', function(event) {
			window.location = "./home/about.php";
		});
		$("#FAQ").on('click touch', function(event) {
			window.location = "./home/FAQ.php";
		});
		$("#btn-login-lessee").on('click touch', function(event) {
			window.location = "lessee/dashboard.php";
		});
		$("#btn-login-owner").on('click touch', function(event) {
			// <?php
			// 	$email = $_POST["login-modal-email"];
			// 	$password = $_POST["login-modal-password"];
				 
			// ?>
			
			window.location = "owner/dashboard.php";
		});
		$("#btn-register-owner").on('click touch', function(event) {
			window.location = "./home/registration/owner-registration.php"; 
			sessionStorage.setItem("user_type", "1"); //user_type is set to 1 for owners
		});
		$("#btn-register-lessee").on('click touch', function(event) {
			window.location = "./home/registration/lessee-registration.php";

		});
		

		sessionStorage.setItem("user_type", "1");
		var user_type = sessionStorage.getItem("user_type");
		var user_type_int = parseInt(user_type);
		user_type = user_type_int;
		console.log(user_type);
		console.log(typeof(user_type));



		//saves the value of the search query to a session variable called "searchQuery"
		$("#zip-search").on("focusout", function(event){
			var search_value = $("#zip-search").val();
			sessionStorage.setItem("searchQuery", search_value);
			
		});

		$("#zip-search-button").on("click", function(event){
			search_value = $("#zip-search").val();
			if((search_value != null) && (search_value != " ")) {
				sessionStorage.setItem("searchQuery", search_value);
				window.location = "basicsearch.php";
			}
		});
		
		

	</script>
</html>


















