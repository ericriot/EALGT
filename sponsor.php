<?php 

$page_title = "Sponsor";


include('assets/php/header.php'); 
require('assets/php/functions.php');

?>

		<h3>Sponsorship</h3>
		
		<p><a href="sponsors.php">View the 2013 Sponsors</a></p>

        <?php if(registrationClosed() ): ?>
            <?php showClosedDiv(); ?>
            <br class="clear" />
            
        <?php else : ?>

            <ul id="sponsorship">
            <li><div class="description">Platinum Sponsor</div> <div class="price">$2500</div>
                <ul>
                <li>Two Foursomes</li>
                <li>Two Tee Signs</li>
                <li>Recognition on Sponsor Board &amp; Program Book</li>
                </ul>
            </li>
            <li><div class="description">Gold Sponsor</div> <div class="price">$1000</div>
                <ul>
                <li>One Foursome</li>
                <li>Two Tee Signs</li>
                <li>Recognition on Sponsor Board &amp; Program Book</li>
                </ul>
            </li>
            <li><div class="description">Silver Sponsor</div> <div class="price">$500</div>
                <ul>
                    <li>Two Tee Signs</li>
                    <li>Recognition on Sponsor Board &amp; Program Book</li>
                </ul>
            </li>
            <li><div class="description">Longest Drive Sponsor</div> <div class="price">$250</div>
                <ul>
                    <li>Name Listed at Tee</li>
                    <li>Recognition on Sponsor Board &amp; Program Book</li>
                </ul>
            </li>
              
            <li><div class="description">Closest to the Pin Sponsor</div> <div class="price">$250</div>
                <ul>
                    <li>Name Listed at Tee</li>
                    <li>Recognition on Sponsor Board &amp; Program Book</li>
                </ul>
            </li>
            <li><div class="description">Tee Sponsor</div> <div class="price">$125</div>
                <ul>
                    <li>Sign at Tee</li>
                    <li>Recognition in Program Book</li>
                </ul>
            </li>
                   
             


                
    		</ul>
                
            <div class="clear"></div>
            
            <p>* Indicates required field.</p>
            
    		<form action="sponsor_proc.php" method="post" id="registerForm">
    			
                <div class="registration">
    				
    				
    				<fieldset><span>Business Name:</span> * <input type="text" class="text" name="name" id="name" /></fieldset>
    				
                    <fieldset><span>Contact Name:</span> * <input type="text" class="text" name="name_contact" id="name_contact" /></fieldset>
    				
    				
    				<div class="clear"></div>
    				
    				<fieldset>Address: * <input type="text" class="text" name="address" id="address" /></fieldset>
    				<fieldset>City, State: * <input type="text" class="text" name="city_state" id="city_state" /></fieldset>
    				
    				<div class="clear"></div>
    				
    				<fieldset>Email: * <input type="text" class="text" name="email" id="email" /></fieldset>
    				<fieldset>Phone: * <input type="text" class="text" name="phone" id="phone"/></fieldset>
    				
    				<div class="clear"></div>
    				
                    <fieldset><span>Sponsorship Level:</span> * 
                        <select id="level" name="level">
                        <option value="">Please select...</option>
                        <option value="Platinum Sponsor">Platinum Sponsor</option>
                        <option value="Gold Sponsor">Gold Sponsor</option>
                        <option value="Silver Sponsor">Silver Sponsor</option>
                        <option value="Longest Drive Sponsor">Longest Drive Sponsor</option>
                        <option value="Closest to the Pin Sponsor">Closest to the Pin Sponsor</option>
                        <option value="Tee Sponsor">Tee Sponsor</option>
                        </select>
                    </fieldset>
                    
                    <div class="clear"></div>
    				
                    
                    <fieldset>Message to us <em>(Optional)</em>  <textarea class="text" name="message" id="message"></textarea>
                    </fieldset>
    				
                    <div class="clear"></div>
                    
                    
    			</div>
    			
    			
                <div class="registration">
                    Total Due: <span id="TotalDue">--</span><br />
                    <fieldset><input type="image" src="assets/images/continue.gif" alt="Continue" /></fieldset>	
                    <p>Please Note: Your sponsorship will not be completed until you enter payment information on the next page. </p>
                    <div class="clear"></div>
                </div>
    		</form>


             <script type="text/javascript" src="assets/javascript/sponsor.js"></script>
        <?php endif; ?>
        

<?php require('assets/php/footer.php'); ?>