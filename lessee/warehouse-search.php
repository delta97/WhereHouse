<?php include "warehouse-search.php"?>
<!DOCTYPE html>

<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='../favicon.ico' type='image/x-icon'/ >
		
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
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
					<input type="number" name="zip-search" id="zip-search" placeholder="zipcode" class="search-input">
					<div class="search-dates-container">
						<label for="begin-date" class="search-dates-label">From: </label>
						<input type="date" id="begin-date" name="begin-date" placeholder="mm/dd/yyyy">
						<label for="end-date" class="search-dates-label">To: </label>
						<input type="date" id="end-date" name="end-date" placeholder="mm/dd/yyyy">
						<select id="storage_pref" style="margin-left: 10px;"class="search-input">
							<option value="null">Storage Preference</option>
							<option value="dry">Dry</option>
							<option value="climate_controlled">Climate Controlled</option>
							<option value="cooler">Cooler</option>
							<option value="frozen">Frozen</option>
						</select>
					</div>
					<button id="zip-search-button" class="zip-search-button">Search</button>
				</div>
				<div class="flex-logo">
					<span class="header-username">Purdue, John</span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>

				</div>
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Dashboard</span>
					</div>
					<div id="rentals-btn" class="sidebar-btn">
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
					<div class="flex-space-between">
						<div class="back-button">
							<i class="fas fa-chevron-left"></i><span class="back-button-text">Back</span>
						</div>
						<h2 class="search-header">Search By Distance For: 83921</h2>
					</div>
					<div class="search-results">
						<table class='table table-hover table-striped table-center'>
							<thead>
								<tr>
									<th scope='col'>Warehouse ID</th>
									<th scope='col'>Warehouse Distance</th>
									<th scope='col'>Warheouse Rating</th>
									<th scope='col'>Warehouse Zipcode</th>
									<th scope='col'>More Information</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td scope="col">56</td>
									<td scope="col">354</td>
									<td scope="col">3.46</td>
									<td scope="col">85634</td>
									<td scope="col"><button id='more-info' type='button' class='btn btn-info' data-toggle='modal' data-target='#search-result-modal'>More Info</button></td>
								</tr>
								<tr>
									<td scope="col">172</td>
									<td scope="col">231</td>
									<td scope="col">4.32</td>
									<td scope="col">92043</td>
									<td scope="col"><button id='more-info' type='button' class='btn btn-info' data-toggle='modal' data-target='#search-result-modal'>More Info</button></td>
								</tr>
								<tr>
									<td scope="col">249</td>
									<td scope="col">843</td>
									<td scope="col">4.22</td>
									<td scope="col">79845</td>
									<td scope="col"><button id='more-info' type='button' class='btn btn-info' data-toggle='modal' data-target='#search-result-modal'>More Info</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
<!-- contract modal -->
		<div id="contract-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="contract-title">Warehouse Contract Details</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              <!-- we can change the innerHTML of these spans to reflect the data we take from the database -->
              <p><input disabled value="Owner First Name" class="form-control form-control-sm form-inline col-lg-4 col-md-4 col-sm-4" style="display: inline; text-align:center; margin: 3px" type="text" id="owner_first_name" name="owner_first_name"> <input disabled value="Owner Last Name" class="form-control form-control-sm form-inline col-lg-4 col-md-4 col-sm-4" style="display: inline; text-align:center; margin: 3px" type="text" id="owner_last_name" name="owner_last_name"> of <input disabled value="Owner Company Name" class="form-control form-control-sm form-inline col-lg-5 col-md-5 col-sm-5" style="display: inline; text-align:center; margin: 3px" type="text" id="owner_company_name" name="owner_company_name"> is the legal owner of the property located at <input disabled value="Warehouse Address 1" class="form-control form-control-sm form-inline col-lg-5 col-md-5 col-sm-5" style="display: inline; text-align:center; margin: 3px" type="text" id="wh_address_1" name="wh_address_1"> <input disabled value="Warehouse Address 2" class="form-control form-control-sm form-inline col-lg-5 col-md-5 col-sm-5" style="display: inline; text-align:center; margin: 3px" type="text" id="wh_address_2" name="wh_address_2">
              <input disabled value="Warehouse City" class="form-control form-control-sm form-inline col-lg-4 col-md-4 col-sm-4" style="display: inline; text-align:center; margin: 3px" type="text" id="wh_city" name="wh_city">, <input disabled value="State" class="form-control form-control-sm form-inline col-lg-3 col-md-3 col-sm-3" style="display: inline; text-align:center; margin: 3px" type="text" id="wh_state" name="wh_state"> <input disabled placeholder="Zipcode" class="form-control form-control-sm form-inline col-lg-3 col-md-3 col-sm-3" style="display: inline; text-align:center; margin: 3px" type="number" id="wh_zipcode" name="wh_zipcode">, and herebyafter is to be referred to as the OWNER. This is a contract BETWEEN the OWNER and the LESSEE.</p>

              <h4>Article 1.</h4>
              <p>By the present contract, the OWNER agrees to rent to the LESSEE a partitioned use of <input class="form-control form-control-sm form-inline col-lg-1 col-sm-2 col-md-2" placeholder="#"style="display: inline;" type="number" id="num_skids" name="num_skids"> skid(s) of the indicated warehouse facility starting on <input class="form-control form-control-sm form-inline col-lg-3 col-sm-3 col-md-3" style="display: inline; text-align: center" width="100px" type="date" id="start-date" name="state-date"> and ending on <input class="form-control form-control-sm form-inline col-lg-3 col-sm-3 col-md-3" style="display: inline; text-align: center" width="100px" type="date" name="end-date" id="">. At the end of this period, which hereinafter shall be referred to as the <i>Period of Occupancy</i>, the contract shall be terminated automatically with no exceptions. In the case of mutual desire for extension, both parties shall initiate a new and separate agreement. </p>

              <h4>Article 3.</h4>
              <p>TERMS OF PAYMENT - PAYMENT FORMULA</p>
              <p>The LESSEE shall pay all agreed upon rental fees to the OWNER on the first day of the <i>Period of Occupancy</i>, and on the first day of every month thereafter until the <i>Period of Occupancy</i> is terminated. All payments shall be directly routed via bank account information provided by the LESSEE. </p>
              <p>REASONS FOR NON RETURN OF DEPOSIT</p>
              <p>In the case of either listed condition, the LESSEE agrees to forfeit  the ability to receive the return of any agreed upon deposit: </p>
              <ol>
                <li>LESSEE fails to comply with the Terms of Payment.</li>
                <li>LESSEE has, at the OWNER's discretion, caused damages to rented property.</li>
              </ol>

              <h4>Article 4.</h4>
              <p>OWNER shall not be deemed to either expressly or impliedly provide any security protection to the Tenant’s property stored in the Storage Space. OWNER shall have no liability for damage to or loss of property caused by heat, cold, theft, vandalism, fire, water, winds, dust, rain, explosion, rodents, insects or any other cause whatsoever. LESSEE is urged to obtain personal property insurance coverage in order to ensure safety of all stored assets. LESSEE hereby agrees to indemnity and to hold harmless OWNER from any and all claims.</p>

              <p>All personal property stored in the storage space(s) will be sold or otherwise disposed of if no rental payment has been received for a continuous 30-day period.</p>

              <p style="text-align:center">OR</p>
              <p>The warehouse portion in question shall be rented empty and clean. The LESSEE has the right, should a need occur, to receive reasonable access to the warehouse unless otherwise indicated by the OWNER.</p>
              <p>In the case of damage to assets, the LESSEE is entitled to submit a claim to Customer Services of WhereHouse INC. within 5 business days of contract termination. After this period, </p>

              <h4>Article 5.</h4> 
            <p>LESSEE hereby agrees to avoid the storage of unlawful components as well as those of which are flammable, foreign, perishable, explosive, corrosive, chemical, or otherwise dangerous. LESSEE shall not utilize the warehouse property for residential purposes, or sublet or otherwise distribute the borrowed property to any other party during the <i>Period of Occupancy</i>. LESSEE warrants that all components stored in the warehouse space are lawfully owned by the LESSEE for the full <i>Period of Occupancy</i> and must provide proof of ownership if requested by OWNER at any time. LESSEE is not permitted to alter any aspect of the warehouse space, or to install additional locks or security measures. LESSEE agrees to clearly and directly communicate and document all stored components for the full <i>Period of Occupancy</i>. </p>
            <h4>Signature</h4>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="signature-checkbox">
                <label class="form-check-label" for="signature-checkbox">
                   <p><b>Checking this box represents your legal signature and agreeance with the aforementioned terms and conditions.</b></p>
                </label>
              </div>


            </div>

          <div class="modal-footer">
  

              <button id="close" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button id="accept" type="button" class="btn btn-warning" disabled>Accept Terms and Conditions</button>
            </div>
        </div>
      </div>

    </div>

		<!-- search result modal --> 
		<div class="modal fade " id="search-result-modal" tabindex="-1" role="dialog" >
		  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Warehouse Information</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
			      </div>
				     	<div class="modal-body flex-row-space-between">
				     		<div>
				        	<table>
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">Warehouse ID</th>
				        			<td style="margin-left: 5px" id="warehouse_id">56</td>
				        		</tr>
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">Storage Type</th>
				        			<td style="margin-left: 5px" id="storage_type">Climate Controlled</td>
				        		</tr>
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">Capacity (number of skids)</th>
				        			<td style="margin-left: 5px" id="capacity">15132</td>
				        		</tr>
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">Size (sqft)</th>
				        			<td style="margin-left: 5px" id="size">125701</td>
				        		</tr>
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">Price Per Skid ($)</th>
				        			<td style="margin-left: 5px" id="price-per-skid">$15</td>
				        		</tr>
				        		
				        	</table>
			   			</div>
			   			<div>
			   				<table style="margin-left: 15px">
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">Address Line 1</th>
				        			<td style="margin-left: 5px" id="warehouse_id">4352 Northridge Avenue</td>
				        		</tr>
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">Address Line 2</th>
				        			<td style="margin-left: 5px" id="storage_type">Suite 208</td>
				        		</tr>
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">City</th>
				        			<td style="margin-left: 5px" id="capacity">Berkeley</td>
				        		</tr>
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">State</th>
				        			<td style="margin-left: 5px" id="size">CA</td>
				        		</tr>
				        		<tr>
				        			<th  style="border-right: 1px solid black; text-align: right; padding-right:5px">Zipcode</th>
				        			<td style="margin-left: 5px"id="price-per-skid">92021</td>
				        		</tr>
				        	</table>
			   			</div>
			   		</div>
			      <div class="modal-footer">
		        <button id="rental-button" type="button" class="btn btn-submit">Rent This Warehouse</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

	
		
		<!-- loading modal -->
	
		<div id="loading-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-center">
		  	<div class="modal-content loading-modal">
		  		<div class="modal-body">
		  		<h1 style="color:#fab011; text-align:center">Loading Search Results...</h1>
			    <div class="modal-body loader">
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
		$('.back-button').click(function(event){
			window.location = "dashboard.php";
		});

		$("tr").on('click', function(event){
			var warehouse_id = $(this).attr("data-warehouseid");
			$.ajax({
				url:'get_warehouse_data.php',
				type: 'post',
				data: {warehouse_id: warehouse_id},
				dataType: 'json',
				success: function(response){
					


				}
			})
		});
		

		$('#rental-button').click(function(event){
			$('#search-result-modal').modal('toggle');
			$('#contract-modal').modal('toggle');
		});
		
		$(document).ready(function(event){
			// $('.header-username').text(sessionStorage.getItem("user_last_name")+ ", "+sessionStorage.getItem("user_first_name"));
		});

		function sessionDestroy() {
			$.get('sessiondestroy.php', function(response) {
				console.log(response);
			});
		}

		$('#zip-search-button').on('click', function(event){
			var zipcode = $('#zip-search').val();
			$('.search-header').text("Search For: "+zipcode);
			var start_date = $('#begin-date').val();
			var end_date = $('#end-date').val();
			var storage_pref = $('#storage_pref').val();
			

			if(!(zipcode === null || zipcode === "") && !(start_date === null || start_date === "") && !(end_date === null || end_date === "")){
				$('#loading-modal').modal('toggle');

				$.ajax({
					url:'get_warehouse_search.php',
					dataType: 'json',
					type: 'post', 
					data: {zipcode: zipcode, begin_date: start_date, end_date, end_date, storage_preference: storage_pref},
					success: function(response){
						var data = response.warehouse_id_d;
						console.log(data);

						
						$('#loading-modal').modal('toggle');
					}
				});

			}
			else{
				alert("Make sure all of the fields are filled in with valid inputs.");
			}
		});

	</script>
</html>
