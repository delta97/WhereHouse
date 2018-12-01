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

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../style.css"> 

		<!-- javascript click functions -->
		<script src="../javascript/click_functions.js"></script>
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
					<div id="renters" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Your Renters</span>
					</div>
					<div id="manage-warehouses" class="sidebar-btn">
						<span class="sidebar-btn-text">Manage Warehouses</span>
					</div>
					<div id="inbox" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox</span>
					</div>
					<div id="analytics" class="sidebar-btn">
						<span class="sidebar-btn-text">Analytics Portal</span>
					</div>
					<div id="account-info" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<div class="page-content">
					<h1>Renters</h1>
					<div id="current-renters">
						<table class="table table-striped table-hover">
							<thead style="text-align:center">
								<tr>
									<th scope="col">First Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Contract ID</th>
									<th scope="col">Warehouse ID</th>
								</tr>
							</thead>
							<tbody id="append-response">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- renter information modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#renter-info-modal">Renter Info Modal</button>
			<div id="renter-info-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  				<div class="modal-dialog modal-dialog-centered modal-renter" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="modal-title" id="registration-modal-title">Contract Profile for <span id="renter-name"></span></h2>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<h4 class="modal-title">Renter Information</h4>
								<table>
									<tr>
										<td><b>First Name:</b></td>
										<td id="user_first_name"></td>
									</tr>
									<tr>
										<td><b>Last Name:</b></td>
										<td id="user_last_name"></td>
									</tr>
									<tr>
										<td><b>Phone Number:</b></td>
										<td id="user_phone_number"></td>
									</tr>
									<tr>
										<td><b>Email:</b></td>
										<td id="user_email"></td>
									</tr>
								</table>

								<h4 class="modal-title">Contract Information</h4>
								<table>
									<tr>
										<td><b>Contract ID:</b></td>
										<td id="contract_id"></td>
									</tr>
									<tr>
										<td><b>Warehouse ID:</b></td>
										<td id="warehouse_id"></td>
									</tr>
									<tr>
										<td><b>Contract Start Date:</b></td>
										<td id="contract_start"></td>
									</tr>
									<tr>
										<td><b>Contract End Date:</b></td>
										<td id="contract_end"></td>
									</tr>
									<tr>
										<td><b>Total Price:</b></td>
										<td id="total_price"></td>
									</tr>
									<tr>
										<td><b>Number of Warehouse Skids:</b></td>
										<td id="num_warehouse_skids"></td>
									</tr>
									<tr>
										<td><b>Temperature Control Option:</b></td>
										<td id="temperature_control_opt"></td>
									</tr>
									<tr>
										<td><b>Security Deposit Amount Paid:</b></td>
										<td id="security_deposit"></td>
									</tr>
								</table>
							</div>
							<div class="modal-footer">
   								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
 							</div>
						</div>
					</div>
			</div>


		</div>
		<div class="footer">Footer</div>
	</body>

	<script type="text/javascript">
		$("#dashboard").click(function() {
			window.location = "dashboard.php";
		});
		$("#renters").click(function() {
			window.location = "renters.php";
		});
		$("#manage-warehouses").click(function() {
			window.location = "warehouses.php";
		});
		$("#inbox").click(function() {
			window.location = "inbox.php";
		});
		$("#analytics").click(function() {
			window.location = "analytics.php";
		});
		$(".logout-button").click(function() {
			window.location = "../index.php";
		});
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});


		$(document).ready(function(event) {
			$.ajax({
				url:'get_your_renters.php',
				type:'post',
				dataType:'json',
				data:{user_id: sessionStorage.getItem('user_id')},
				success: function(response){
					var lessee_first_names = response['lessee_first_name'];
					var lessee_last_names = response['lessee_last_name'];
					var contract_ids = response['contract_id'];
					var warehouse_ids = response['warehouse_id'];
					console.log(lessee_first_names, lessee_last_names, contract_ids, warehouse_ids);
					var size = contract_ids.length;
					var x = 0;
					//append html content within the table for each current renter
					while(x < size){
						$('#append-response').html(
							"<tr data-toggle='modal' data-target='renter-info-modal' id='renter' data-contractID='"+ contract_ids[x] +"'><td>"+lessee_first_names[x]+"</td><td>"+lessee_last_names[x]+"</td><td>"+contract_ids[x]+"</td><td>"+warehouse_ids[x]+"</td></tr>");
						x++;
					}
				}
			});
		});


		//when you click on a row, it should open a modal with more information
		$('#renter').on('click', function(event) {
			var contract_id = $(this).attr("data-contractID");
			$.ajax({
				url:'get_contract_renter_info.php',
				data:{contract_id: contract_id},
				dataType: 'json',
				type:'post',
				success: function(response){
					var renter_first_name= response['renter_last_name'];
					var renter_last_name = response['renter_first_name'];
					var renter_phone = response['renter_phone'];

					var renter_phone_parsed = "(" + renter_phone.slice(0, 3) + ") " + renter_phone.slice(3, 6) + " - " + renter_phone.slice(6,10);

					var renter_email = response['renter_email'];
					var contract_start = response['contrat_start'];
					var contract_end = response['contract_end'];
					var total_price = response['total_price'];
					var num_skids = response['num_skids'];
					var temp_control = response['temp_control'];
					var security_deposit = response['security_deposit'];
					var warehouse_id = response['warehouse_id'];

					$('#renter-name').text(renter_first_name+" "+renter_last_name);
					$('#user_first_name').text(renter_first_name);
					$('#user_last_name').text(renter_last_name);
					$('#user_phone_number').text(renter_phone_parsed);
					$('#user_email').text(renter_email);
					$('#contract_id').text(contract_id);
					$('#warehouse_id').text(warehouse_id);
					$('#contract_start').text(contract_start);
					$('#contract_end').text(contract_end);
					$('#total_price').text("$" + total_price);
					$('#num_warehouse_skids').text(num_skids);
					$('#temperature_control_opt').text(temp_control);
					$('#security_deposit').text("$" + security_deposit);
				}
			})
		});
	</script>
</html>
