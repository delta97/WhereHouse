<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
  </head>
  
  <body>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contract-modal">Contract Modal</button>
    
	<!-- Contract Modal -->
    <div id="contract-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="contract-title">Warehouse Contract Details</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
			  
			<!-- Contract Contents -->  
            <div class="modal-body">
			  <!-- we can change the innerHTML of these spans to reflect the data we take from the database -->
			  <p><input disabled value="Owner First Name" class="form-control form-control-sm form-inline col-lg-4 col-md-4 col-sm-4" style="display: inline; text-align:center; margin: 3px" type="text" id="owner_first_name" name="owner_first_name"> <input disabled value="Owner Last Name" class="form-control form-control-sm form-inline col-lg-4 col-md-4 col-sm-4" style="display: inline; text-align:center; margin: 3px" type="text" id="owner_last_name" name="owner_last_name"> of <input disabled value="Owner Company Name" class="form-control form-control-sm form-inline col-lg-5 col-md-5 col-sm-5" style="display: inline; text-align:center; margin: 3px" type="text" id="owner_company_name" name="owner_company_name"> is the legal owner of the property located at <input disabled value="Warehouse Address 1" class="form-control form-control-sm form-inline col-lg-5 col-md-5 col-sm-5" style="display: inline; text-align:center; margin: 3px" type="text" id="wh_address_1" name="wh_address_1"> <input disabled value="Warehouse Address 2" class="form-control form-control-sm form-inline col-lg-5 col-md-5 col-sm-5" style="display: inline; text-align:center; margin: 3px" type="text" id="wh_address_2" name="wh_address_2">
			  <input disabled value="Warehouse City" class="form-control form-control-sm form-inline col-lg-4 col-md-4 col-sm-4" style="display: inline; text-align:center; margin: 3px" type="text" id="wh_city" name="wh_city">, <input disabled value="State" class="form-control form-control-sm form-inline col-lg-3 col-md-3 col-sm-3" style="display: inline; text-align:center; margin: 3px" type="text" id="wh_state" name="wh_state"> <input disabled placeholder="Zipcode" class="form-control form-control-sm form-inline col-lg-3 col-md-3 col-sm-3" style="display: inline; text-align:center; margin: 3px" type="number" id="wh_zipcode" name="wh_zipcode">, and herebyafter is to be referred to as the OWNER. This is a contract BETWEEN the OWNER and the LESSEE.</p>

			  <h4>Article 1.</h4> <!-- Indication of Lessee Requirements -->
			  <p>By the present contract, the OWNER agrees to rent to the LESSEE a partitioned use of 
			  <input class="form-control form-control-sm form-inline col-lg-1 col-sm-2 col-md-2" placeholder="#"style="display: inline;" type="number" id="num_skids" name="num_skids"> 
			  skid(s) of the indicated warehouse facility starting on <input class="form-control form-control-sm form-inline col-lg-3 col-sm-3 col-md-3" style="display: inline; text-align: center" width="100px" type="date" id="start-date" name="state-date"> and ending on <input class="form-control form-control-sm form-inline col-lg-3 col-sm-3 col-md-3" style="display: inline; text-align: center" width="100px" type="date" name="end-date" id="end-date">. 
			  At the end of this period, which hereinafter shall be referred to as the <i>Period of Occupancy</i>, the contract shall be terminated automatically with no exceptions. 
			  In the case of mutual desire for extension, both parties shall initiate a new and separate agreement. </p>

			  <h4>Article 2.</h4> <!-- Payment Conditions -->  
			  <p>The LESSEE is responsible for completing a total payment of <input disabled value="Amount" class="form-control form-control-sm form-inline col-lg-4 col-md-4 col-sm-4" style="display: inline; text-align:center; margin: 3px" type="number" id="payment_amount" name="payment_amount"> 
			  calculated via the following terms: </p>
			  
			  <p>terms</p><p>terms</p>
			  
			  
			  <p>The LESSEE shall pay all agreed upon rental fees to the OWNER within 30 days prior to the first day of the <i>Period of Occupancy</i>.  
			  All payments shall be directly routed via bank account information provided by the LESSEE. </p>
			  <p>REASONS FOR NON RETURN OF DEPOSIT</p>
			  <p>In the case of either listed condition, the LESSEE agrees to forfeit the ability to receive the return of any agreed upon deposit: </p>
			  <ol>
				<li>LESSEE fails to comply with the Terms of Payment.</li>
				<li>LESSEE has, at the OWNER's discretion, caused damages to rented property.</li>
			  </ol>

			  <h4>Article 3.</h4> <!-- Damage -->
			  <p>OWNER shall not be deemed to either expressly or impliedly provide any security protection to the LESSEE's stored assets. 
			  OWNER shall have no liability for damage to or loss of property caused by heat, cold, theft, vandalism, fire, water, winds, dust, rain, explosion, rodents, insects or any other cause whatsoever. 
			  LESSEE is urged to obtain personal property insurance coverage in order to ensure safety of all stored assets. LESSEE hereby agrees to indemnity and to hold harmless OWNER from any and all claims.</p>

			  <p>Security of stored assets is only granted for the <i>Period of Occupancy</i> under the condition that LESSEE abides to all Payment Terms. 
			  All personal property stored in the storage space(s) will be sold or otherwise disposed of if no rental payment been received for a continuous 30-day period OR if assets have not been removed by the end of the last 
			  day of the outlined <i>Period of Occupancy</i>.</p>

			  
			  <!--
			  <p>The warehouse portion in question shall be rented empty and clean. The LESSEE has the right, should a need occur, to receive reasonable access to the warehouse unless otherwise indicated by the OWNER.</p>
			  <p>In the case of damage to assets, the LESSEE is entitled to submit a claim to Customer Services of WhereHouse INC. within 5 business days of contract termination. After this period, </p>
				-->

			  <h4>Article 4.</h4> <!-- Lawful Use Agreement -->
			  <p>LESSEE hereby agrees to avoid the storage of unlawful components as well as those of which are flammable, foreign, perishable, explosive, corrosive, chemical, or otherwise dangerous. 
			  LESSEE shall not utilize the warehouse property for residential purposes, or sublet or otherwise distribute the borrowed property to any other party during the <i>Period of Occupancy</i>. 
			  LESSEE warrants that all components stored in the warehouse space are lawfully owned by the LESSEE for the full <i>Period of Occupancy</i> and must provide proof of ownership if requested by OWNER 
			  at any time. LESSEE is not permitted to alter any aspect of the warehouse space, or to install additional locks or security measures. LESSEE agrees to clearly and directly communicate and document 
			  all stored components for the full <i>Period of Occupancy</i>. </p>
			  <h4>Signature</h4>
			  <div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="signature-checkbox">
				<label class="form-check-label" for="signature-checkbox">
				   <p><b>Checking this box represents your legal signature and agreeance with the aforementioned terms and conditions.</b></p>
				</label>
			  </div>
            </div>

			<!-- Accept or Close Buttons -->	
			<div class="modal-footer">
				<button id="close" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button id="accept" type="button" class="btn btn-warning" disabled>Accept Terms and Conditions</button>
            </div>
        </div>
      </div>

    </div>
  </body>
  
  <!-- Restricts user from accepting contract until they have provided digital agreement -->
  <script>
    $('#signature-checkbox').on('click', function() {
      if($('#signature-checkbox').prop('checked') == true){
        $('#accept').prop("disabled", false);
      }
      else {
        $('#accept').prop("disabled", true);
      }
      
    });
  </script>
</html>
