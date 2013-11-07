<?php 

$page_title = "Register";

include('assets/php/header.php'); 
require('assets/php/functions.php'); 
require('assets/php/variables.php'); 
?>	
		<h3>Player / Team / Guest Registration</h3>
		
    <?php if(registrationClosed() ): ?>
        <?php showClosedDiv(); ?>
        <br class="clear" />
        
    <?php else : ?>

		<p>Please complete the form below and click CONTINUE to provide payment information.</p>
		
        <ul id="sponsorship">
        <li><div class="description">Golfer</div> <div class="price">$<?php echo $cost_player; ?></div>
            <ul>
            <li>Includes golf with cart, lunch, and dinner.</li>
            </ul>
        </li>
        <li><div class="description">Dinner Guest</div> <div class="price">$<?php echo $cost_guest; ?></div>
            <ul>
            <li>Includes dinner only.</li>
            </ul>
        </li>
        </ul>
        
        <div class="clear"></div>
        
        <p>* Indicates required field.</p>
    
		<form action="register_proc.php" method="post" id="registerForm">
			
            <?php for($i = 1; $i <= 4; $i++) : ?>
			<div class="registration">
				
				
				<fieldset><span>Name:</span> <?php if($i == 1) echo "*"; ?> <input type="text" class="text" name="name_<?php echo $i; ?>" id="name_<?php echo $i; ?>" /></fieldset>
				
				<fieldset>Registration Type: <?php if($i == 1) echo "*"; ?>
					<label><input type="radio" name="registration_type_<?php echo $i; ?>" value="Player" /> Player</label>
					<label><input type="radio" name="registration_type_<?php echo $i; ?>" value="Guest" /> Guest</label>
				</fieldset>
				
				<div class="clear"></div>
				
				<fieldset>Address: <?php if($i == 1) echo "*"; ?> <input type="text" class="text" name="address_<?php echo $i; ?>" id="address_<?php echo $i; ?>" /></fieldset>
				<fieldset>City, State: <?php if($i == 1) echo "*"; ?> <input type="text" class="text" name="city_state_<?php echo $i; ?>" id="city_state_<?php echo $i; ?>" /></fieldset>
				
				<div class="clear"></div>
				
				<fieldset>Email: <?php if($i == 1) echo "*"; ?> <input type="text" class="text" name="email_<?php echo $i; ?>" id="email_<?php echo $i; ?>" /></fieldset>
				<fieldset>Phone: <?php if($i == 1) echo "*"; ?> <input type="text" class="text" name="phone_<?php echo $i; ?>" id="phone_<?php echo $i; ?>"/></fieldset>
				
				<div class="clear"></div>
				
                
                
			</div>
            <?php endfor; ?>
            
            <div class="registration">
                    <fieldset>Message to us <em>(Optional)</em>  <textarea class="text" name="message" id="message"></textarea>
                    </fieldset>
                    
                    <div class="clear"></div>
                </div>
            
		  <div class="registration">
            Total Due: <span id="TotalDue">--</span><br />
            <fieldset><input type="image" src="assets/images/continue.gif" alt="Continue" /></fieldset>	
            <p>Please Note: Your registration will not be completed until you enter payment information on the next page. </p>
            <div class="clear"></div>
          </div>
		</form>
    <script type="text/javascript" src="assets/javascript/register.js"></script>

  <?php endif; ?>



<?php require('assets/php/footer.php'); ?>