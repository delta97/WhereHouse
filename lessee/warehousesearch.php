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
		<link rel="stylesheet" href="../style.css"> 
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
				</div>
				<div class="search">
					<input id="zip-search" type="text" class="search-input form-control w-100" placeholder="Search Warehouses By Zipcode" aria-label="Search">
					<button id="zip-search-button" type="button" class="btn btn-dark">Search</button>
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
				<div class="search-container">
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
								<tr class="clickable-row">
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

				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

			<div id="search-result-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      ...
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
			var search_value = sessionStorage.getItem("searchQuery");
			if(search_value == null || search_value = ""){
				$('#zip-search').val("");
			}
			else {
				$("#zip-search").val(search_value);
			}
			$(".search-header").text("Search For: " + search_value);

		});

		


	
		$("#zip-search-button").on("click", function(event) {
			var searchQuery = $('#zip-search').val();
			if()
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


















