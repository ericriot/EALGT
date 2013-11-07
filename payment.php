<?php
$page_title = "Payment";

session_start(); // This page will use the session variables

require('assets/php/functions.php');

    
    
// This form requires some session information to be set. If it's not present, something is wrong, send them back to the homepage
if(!array_key_exists('payment_mode', $_SESSION) || $_SESSION['SECURETOKEN'] == '' || $_SESSION['SECURETOKENID'] == '') {
    
    // A function will send this out, hopefully.
    emailError("Session not set on payment.php");
    
    header('Location:index.php?msg=paymentError');
    // the header is too strong, lets do some javascript instead
    // echo "<script>alert('We are sorry, your session has ended or you came to this page in error. Please try again.); history.go(-1);</script>";
    
} 
    
// We're good, back to the regular setup
$payment_amount = $_SESSION['payment_amount'];

?>
<?php include('assets/php/header.php'); ?>

    <h3>Enter Payment Information</h3>
    
    <?php
    
    $payment_amount = number_format($_SESSION['payment_amount'], 2);
    $payment_mode = $_SESSION['payment_mode'];

    if ($payment_mode === 'donation') {
        echo '<p>Donation Amount: <span id="TotalDue">$' . $payment_amount . '</span></p>';
    } elseif ($payment_mode === 'registration') {
        echo '<p>Registration Amount: <span id="TotalDue">$' . $payment_amount . '</span></p>';
    } elseif ($payment_mode === 'sponsor') {
        echo '<p>Sponsorship Amount: <span id="TotalDue">$' . $payment_amount . '</span></p>';
    }
    ?>

    <p>Thanks, you're almost there! Transaction is now being handled by PayPal using the form below.</p>
    
    <p style="font-size:110%; color:brown; font-weight:bold;">
        Note: Please provide payment via the 'Pay with credit or debit card' option below as we are currently experiencing technical difficulties with the 'Pay with PayPal' options. The payment with credit and debit card option is securely handled through PayPal.
        
        
    </p>
    
    <iframe 
        id="PayPalIFrame" 
        src="https://payflowlink.paypal.com?MODE=LIVE&SECURETOKENID=<?php echo $_SESSION['SECURETOKENID']; ?>&SECURETOKEN=<?php echo $_SESSION['SECURETOKEN']; ?>"
        scrolling="yes"
        ></iframe>




<?php require('assets/php/footer.php'); ?>