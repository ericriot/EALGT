<?php 

$page_title = "Donate";


include('assets/php/header.php'); ?>

		<h3>Donation</h3>
		
		<p>Thank you for supporting the Evan Allen Landry Memorial Scholarship. Please complete this form and click CONTINUE to provide payment information.</p>
		
        <p>* Indicates required field.</p>

		<form action="donate_proc.php" method="post" id="registerForm">
			
            <div class="registration">
				
				
				<fieldset><span>Name:</span> * <input type="text" class="text" name="name" id="name" /></fieldset>
				<fieldset><span>Amount:</span> * $<input type="text" class="text" name="amount" id="amount"  /></fieldset>
				
				<div class="clear"></div>
				
				<fieldset>Address: * <input type="text" class="text" name="address" id="address" /></fieldset>
				<fieldset>City, State: * <input type="text" class="text" name="city_state" id="city_state" /></fieldset>
				
				<div class="clear"></div>
				
				<fieldset>Email: * <input type="text" class="text" name="email" id="email" /></fieldset>
				<fieldset>Phone: * <input type="text" class="text" name="phone" id="phone"/></fieldset>
				
				<div class="clear"></div>
				
                <fieldset>Message to us <em>(Optional)</em>  <textarea class="text" name="message" id="message"></textarea>
                </fieldset>
				
                <div class="clear"></div>
                
			</div>
			
			
            <div class="registration">
            
                <fieldset><input type="image" src="assets/images/continue.gif" alt="Continue" /></fieldset>	
                <p>Please Note: Your donation will not be completed until you enter payment information on the next page. </p>
                <div class="clear"></div>
            </div>
		</form>


<script type="text/javascript" src="assets/javascript/donate.js"></script>


<?php require('assets/php/footer.php'); ?>