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

		<title>Wherehouse | Home</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<!-- AJAX -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- font awesome icons -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">


		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../style.css"> 
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
				</div>
				<div class="search">
					<form id="zip-search-form" action="get_warehouse_data.php" target="search-container">
						<input id="zip-search" type="text" class="search-input form-control w-100" placeholder="Search Warehouses By Zipcode" aria-label="Search">
						<button id="zip-search-button" type="button" class="btn btn-dark">Search</button>
					</form>
				</div>
				<div class="flex-logo">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				</div>
			</div>
			<div class="nav">
				<div class="flex-logo">
					<span class="logo-text"><a href="../index.php">WhereHouse</a></span>
				</div>
				<span id="home" class="navbar-item"><a href="index.php">Home</a></span>
				<span id="about" class="navbar-item"><a href="./home/about.php">About</a></span>
				<span id="FAQ" class="navbar-item"><a href="./home/FAQ.php">FAQ</a></span>
			</div>
			<div class="search-body no-space search-flex">
				<div class="flex-header">
					<div class="search-header"></div>
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
				</div>
				<div id="search-container" class="search-container">
					<table class="search-item table">
						<thead>
							<tr>
								<th class="text-center" scope="col">
									Name
								</th>
								<th class="text-center" scope="col">
									Rating
								</th>
								<th class="text-center" scope="col">
									Price (Per Skid)
								</th>
								<th class="text-center" scope="col">
									Distance From (Zipcode will be entered by PHP)<?php $_SESSION["search_zipcode"]; ?>
								</th>
							</tr>
							<tbody>
								<!-- we use the data-* attribute to store the warehouse ID in each row, so that on-click, we can get that warehouse's ID to populate the form -->
								<tr id="1" data-warehouseID="1" data-toggle="modal" data-target="#search-result-modal" class="clickable-row">
									<td class="text-center">
										Warehouse Name
									</td>
									<td class="text-center">
										5 Stars
									</td>
									<td class="text-center">
										$5
									</td>
									<td class="text-center">
										8 miles
									</td>
								</tr>
							</tbody>
						</thead>
					</table>
				</div>

		
				<!-- generic search result modal -->
				<div id="search-result-modal" class="modal fade bd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
	        					<h5 class="modal-title" id="exampleModalLabel">Warehouse Name</h5>
	        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	         						<span aria-hidden="true">&times;</span>
	        					</button>
	      					</div>
	      					<div class="modal-body">
	        					
		      				</div>
	      					<div class="modal-footer">
	        					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      					</div>
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
		//add the "searchQuery" 
		$(document).ready(function() {
			var search_value = sessionStorage.getItem("searchQuery");
			if(search_value == null || search_value == ""){
				$('#zip-search').val("");
			}
			else {
				$("#zip-search").val(search_value);
			}
			$(".search-header").text("Search For: " + search_value);

		});

		$('#1').data('warehouseID', 1);
		$('#1').on('click', function(event) {
			var warehouseID = $('#1').data('warehouseID');
			getWarehouseData(warehouseID);

		});
		function getWarehouseData(warehouseID){
			console.log(warehouseID);

			//call to server to get the data for the warehouseID

			$.ajax({
				url: 'get_warehouse_data.php',
				type:'POST', 
				data: {'warehouseID': warehouseID},
				contentType:'application/json',
				success: function(data){
					var address_line_1 = data.address_line_1;
					var address_line_2 = data.address_line_2;
					var city = data.city;
					var state = data.state;
					var zipcode = data.zipcode;
					var price_per_skid = data.price_per_skid;
					var capacity = data.capacity;
					var square_footage = data.square_footage;
					var owner_id = data.owner_id;
					var error = data.error;
					$('.modal-body').append("Address Line 1" + address_line_1);
					console.log(address_line_1);
					
				}

			});

		}


	
		$("#zip-search-button").on("click", function(event) {
			var searchQuery = $('#zip-search').val();
			if(searchQuery == null || searchQuery == ""){

			}
			sessionStorage.setItem("searchQuery", searchQuery);
			search_value = sessionStorage.getItem("searchQuery");
			$(".search-header").text("Search For: " + search_value);
		});
		$('#zip-search').on('focusout', function(event) {
			var searchQuery = $('#zip-search').value;
			if(searchQuery == null || searchQuery == ""){
				searchQuery = "Oops...you forgot to enter a zipcode to search";
			}
			sessionStorage.setItem("searchQuery", searchQuery);
		});

	</script>
</html>


















