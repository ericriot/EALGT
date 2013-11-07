<?php 
session_start();

$page_title = "Thank You";


include('assets/php/header.php');  


 // This page will use the session variables

require('assets/php/functions.php');

$payment_mode = $_SESSION['payment_mode'];

$strHeading = '';

switch ($payment_mode) {
    case 'donation':
        $strHeading = 'Thank you for supporting the Evan Allen Landry Golf Tournament.';
        break;
    case 'registration':
        $strHeading = 'Thank you for supporting the Evan Allen Landry Golf Tournament.<br />We look forward to seeing you there!';
        break;
    case 'sponsor':
        $strHeading = 'Thank you for supporting the Evan Allen Landry Golf Tournament.';
        break;
}


?>

<h3><?php echo $strHeading; ?></h3>

<p>An email has been sent to you confirming your order details.</p>



<?php require('assets/php/footer.php'); ?>