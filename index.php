<?php 

$page_title = "Welcome";

include('assets/php/header.php');
require('assets/php/variables.php');
require('assets/php/functions.php');

?>
	
		<div class="home_option">
			<div class="evan_image">
				<img src="assets/images/evan_web3.jpg" alt="Evan Allen Landry"   />
			</div>
			<div >
				<p>
				Evan Allen Landry was a passionate golfer. 
				He played countless rounds at Hunter Memorial Golf Course, where enjoying the outdoors and friendship of his fellow golfers was as important as the game. 
				Tragically, Evan's life was cut short by schizophrenia, which was diagnosed in his mid-twenties. 
				The Evan Allen Landry Golf Tournament has been created to honor Evan's life and to raise awareness of severe mental illness, which affects 6% of the population and is too often fatal. 
				Tournament proceeds will be used to fund the Evan Allen Landry Memorial Scholarship.
				</p>
			</div>
		</div>
		
		<?php if(registrationClosed() ): ?>
				<?php showClosedDiv(); ?>

		<?php else : ?>

				
				<div class="home_option">
					<div class="home_image">
						<a href="register.php"><img src="assets/images/register.gif" alt="Register" /></a>
					</div>
					<div class="home_description">
						<p>
						
						To register yourself or a team or to register as a non-golfing dinner guest, click REGISTER.
						</p>
						
						<ul>
						<li>Golfers - $<?php echo $cost_player; ?> per player (includes golf w/cart, lunch and dinner)</li>
						<li>Guests - $<?php echo $cost_guest; ?> (dinner only)</li>
						</ul>
						
						
					</div>
				</div>
				
      <?php endif; ?>

      
				
		        <div class="home_option">
					<div class="home_image">
						<a href="sponsor.php"><img src="assets/images/sponsor.gif" alt="Sponsor" id="sponsorImage" /></a>
					</div>
					<div class="home_description">
						<p>
						Advertise your business while supporting the Evan Allen Landry Memorial Scholarship. To learn more click SPONSOR.
						</p>

						<p><a href="sponsors.php">View the 2013 Sponsors</a></p>
						
					</div>
				</div>

        <div class="home_option">
			<div class="home_image">
				<a href="donate.php"><img src="assets/images/donate.gif" alt="Donate" /></a>
			</div>
			<div class="home_description">
				<p>
				To donate to the Evan Allen Landry Memorial Scholarship, click DONATE.
				</p>
			</div>
		</div>
		

		<div class="home_option">
			<div class="home_image">
				<img src="assets/images/schedule.gif" alt="Schedule" />
			</div>
			<div class="home_description">
				
				<ul>
				<li>11AM Registration and Complimentary Driving Range
				<li>NOON Shotgun Start (Scramble Format)
				<li>6PM Dinner at Violi's Tent (at Golf Course)<br />
					Raffle and Awards<br />
					Prizes for Lowest Team Scores,Closest to Pin, Longest Drive and Hole in One
				</li>
                </ul>
				
			</div>
		</div>
		
		
		<div class="home_option">
			<div class="home_image">
				<a href="http://goo.gl/maps/pdhKd" target="_blank"><img src="assets/images/location.gif" alt="Location" /></a>
			</div>
			<div class="home_description">
				
				<p>
				<strong>Hunter Memorial Golf Course</strong> - <a href="http://www.huntergolfclub.com" target="_blank">huntergolfclub.com</a><br />
				688 Westfield Road<br />
				Meriden, CT 06450<br />
				(203) 634-3366<br />
				<a href="http://goo.gl/maps/pdhKd" target="_blank">View on Google Maps</a>
				</p>
				
				
			</div>
		</div>
		
		
		
<?php require('assets/php/footer.php'); ?>

