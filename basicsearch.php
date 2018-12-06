<!DOCTYPE html>
<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'>

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
				<div class="flex-logo">
				
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
				<div class="flex-center-column">
					<h1 style="font-size: 45px; margin-top: 25px"> Register for an account to search warehouses</h1>
					<h2 style="font-size: 30px; margin-top: 10px;">The page will refresh and return home.</h2>
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
				<!-- generic search result modal -->
				<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="search-modal-title" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-formatting">
							<div class="modal-header">
								<h4 class="modal-title" id="login-modal-title">  <!--This is where the Warehouse title will go --> </h4>
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
		
		$(document).ready(function() {
			setTimeout("window.location = 'index.php'", 10000);	//returns to home page after 10 seconds.		
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


		//after clicking out of the search bar
		$('#zip-search').on('focusout', function(event){
			var search_query = $('#zip-search').val();
			sessionStorage.setItem("search_query", search_query);
		});

		//search bar submit
		$('#zip-search-button').on('click', function(event) {
			event.preventDefault();
			var search_query = $('#zip-search').val();
			if(!(search_query === null) && !(search_query === "")){
				sessionStorage.setItem("search_query", search_query);
				window.location = "basicsearch.php";
			}
			else {
				alert("Please enter a valid zipcode to search for warehouses.");
			}
		});



		$('#zip-search-button').on('click', function(event) {
			var search_query = $('#zip-search').value;
			if(search_query != null && search_query != ""){
				sessionStorage.setItem("search_query", search_query);
				$.ajax({
					url:'',
					type: 'post',
					dataType: 'json',
					data: {search_query: search_query},
					success: function(response) {

					}
				});
			}
		});

		//after clicking out of the search bar
		$('#zip-search').on('focusout', function(event){
			var search_query = $('#zip-search').val();
			sessionStorage.setItem("search_query", search_query);
		});

		//search bar submit
		$('#zip-search-button').on('click', function(event) {
			event.preventDefault();
			var search_query = $('#zip-search').val();
			if(!(search_query === null) && !(search_query === "")){
				sessionStorage.setItem("search_query", search_query);
				window.location = "basicsearch.php";
			}
			else {
				alert("Please enter a valid zipcode to search for warehouses.");
			}
		});
		

	</script>
</html>


















