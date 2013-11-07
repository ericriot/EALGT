<?php

session_start(); // This page will use the session variables

require('assets/php/functions.php');





// We're good, back to the regular setup
$payment_amount = $_SESSION['payment_amount'];

?>
<?php include('assets/php/header.php'); ?>

    <h3>PayPal Error.</h3>

    <p>We are sorry, something has gone wrong with your PayPal information. Your information has been saved and we will contact you shortly.</p>
    
    <?php
    // A function will send this out, hopefully.
    emailError("Error received from PayPal");
    ?>
        
   

<?php require('assets/php/footer.php'); ?>

