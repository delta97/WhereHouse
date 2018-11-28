<!DOCTYPE html>
<html>
	<head>
		<!-- 3rd party footer content -  -->
		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">



		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Wherehouse | Home</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<!-- AJAX -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="style.css"> 
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="index.php"><img class="logo" src="./images/logo.png"></a></span>
				</div>
				<form class="search" action="searchquery.php">
					<input id="zip-search" name="zip-search" type="text" class="search-input form-control w-100" placeholder="Search Warehouses By Zipcode" aria-label="Search">
					<button id="zip-search-button" type="submit" class="btn btn-dark">Search</button>
				</form>

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
										<button value="0" type="button" class="btn btn-next btn-reg" id="btn-register-lessee">I want to lease a warehouse</button>
	   									<button value="1" type="button" class="btn btn-next btn-reg" id="btn-register-owner">I want to rent my warehouse</button>
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
				<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-title" >
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-formatting">
							<div class="modal-header">
								<h4 class="modal-title" id="login-modal-title">Existing User? Login</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<iframe id="submit-redirect" name="submit-redirect" style="display: none"></iframe>
								<form id="login-modal-form" action="login.php" target="submit-redirect">
									<div class="form-group">
								    	<label for="login-modal-email">Email address</label>
								    	<input type="text" name="login-modal-email" class="form-control" id="login-modal-email" aria-describedby="enterEmail" placeholder="Enter email">
								  	</div>
								  	<div id="modal-pass" class="form-group">
								    	<label for="login-modal-password">Password</label>
								    	<input name="login-modal-password" type="password" class="form-control" id="login-modal-password" placeholder="Password">
								    </div>
								    <div class="alerts">
								    </div>
								    <div class="modal-footer">
										<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-next" id="submit-button">Log In</button>
 									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="footer" style="display: flex; flex-direction: row; justify-content: space-between; align-content: center;">
				<div class="footer-left" style="align-self:center;margin-left: 200px; color:white;">
					<p><a href="lessee/dashboard.php" style="color:white;">Go to Lessee</a></p>
				</div>
				<div class="footer-right" style="align-self:center;margin-right: 200px; color: white;">
					<p><a href="owner/dashboard.php" style="color:white;">Go to Owner</a></p>
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

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="https://www.instagram.com/wherehouse.8.inc/"><i class="fa fa-instagram"></i></a>
					<!-- Add a link to instagram... replace # with actual links> -->

				</div>

			</div>

		</footer>
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
		
		
		
		$("#btn-register-owner").on('click touch', function(event) {
			window.location = "./home/registration/owner-registration.php"; 
			sessionStorage.setItem("user_type", "1"); //user_type is set to 1 for owners
		});
		$("#btn-register-lessee").on('click touch', function(event) {
			window.location = "./home/registration/lessee-registration.php";

		});
		

		



		//saves the value of the search query to a session variable called "searchQuery"
		$("#zip-search").on("focusout", function(event){
			var search_value = $("#zip-search").value;
			sessionStorage.setItem("searchQuery", search_value);
			
		});

		$("#zip-search-button").on("click", function(event){
			var search_value = $("#zip-search").value;
			if((search_value != null) && (search_value != "")) {
				window.location = "basicsearch.php";
			}
		});
		$('#submit-button').on('click', function(){
			$('#submit-redirect').empty();
			$('#login-modal-form').submit();

		});

		$('#submit-button').on('click', function(event){
			event.preventDefault();
			$('.alerts').empty(); //gets rid of any existing alerts on re-submission

			//get form data
			var email_address = $('#login-modal-email').value;
			var password = $('#login-modal-password').value;
			var inputArray = {email: email_address, password:password};


			$.ajax({
				type: 'POST', 
				url: 'login.php',
				contentType: "application/json",
				data: inputArray,
				dataType: 'json',
				success: function(resp) {
					var response = JSON.parse(resp);
 					var user_type = response.user_type;
 					var user_id = response.user_id;
 					var user_first_name = response.user_first_name;
 					var user_last_name = response.user_last_name;
 					var user_type_should_be = response.sql;
 					var user_email = response.email;


 					console.log(user_type);
 					console.log(user_id);
 					console.log(user_first_name);
 					console.log(user_email);


 					if(user_type === -1){
 						$('.alerts').append("<div style=\"margin: 10px;\" class=\"alert alert-danger\" role=\"alert\"><strong>Looks like you haven't made an account yet. Please make an account before you try to log in.</strong></div>");
 					}
 					else if(user_type === -2){
 						$('.alerts').append("<div style=\"margin: 10px;\" class=\"alert alert-danger\" role=\"alert\"><strong>Your password or email is incorrect.</strong></div>");
 					}
 					else if(user_type === 0){
 						window.location = "./lessee/dashboard.php";
 					}
 					// else if(user_type === 1) {
 					// 	window.location = "./owner/dashboard.php";
 					// }
				}
			});
		});


		// $('#submit-button').on('click', function(event) {
		// 	sendobj = new Object();
		// 	sendobj.email = $('#login-modal-email').value;
		// 	sendobj.password = $('#login-modal-password').value;

		// 	dbParam = JSON.stringify(sendobj);

		// 	if (window.XMLHttpRequest) {
		// 		login = new XMLHttpRequest();

		// 	} 
		// 	else {
		// 		login = new ActiveXObject("Microsoft.XMLHTTP");
		// 	}
		// 	login.onreadystatechange = function() {
		// 		if(this.readyState == 4 && this.status == 200) {
		// 			var response = JSON.parse(this.responseText);
		// 			handleResponse(response);
		// 		}
		// 	};

		// 	var url = "login.php" + $.param(sendobj);

		// 	login.open("POST","login.php", true);
		// 	login.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// 	login.send("x=" + dbParam);

		// 	function handleResponse(resp) {
		// 		alert(resp);
		// 		var sql = resp.sql;
		// 		var id = resp.user_id;
		// 		var user_type = resp.user_type;
		// 		var user_first_name = resp.user_first_name;
		// 		var user_last_name = resp.user_last_name;
		// 		var user_email = resp.email;

		// 		console.log("sql: " + sql);
		// 		console.log("user_id: " + id);
		// 		console.log("user_first_name: " + user_first_name);
		// 		console.log("user_last_name: " + user_last_name);
		// 		console.log("email: " + user_email);

		// 	}
		// });


	</script>

	


</html>


















