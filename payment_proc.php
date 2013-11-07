<?php

session_start(); // This page will use the session variables

require('assets/php/functions.php');


// We're good, back to the regular setup
$payment_amount = $_SESSION['payment_amount'];
$payment_mode = $_SESSION['payment_mode'];

$payment_mode_friendly = '';

$id = $_SESSION[$payment_mode . '_id'];

// This page only hits on a successful pay pal transaction, so we don't have to worry about any pay pal errors at this point
$PPREF = getGetValue('PPREF');
$TRANSTIME = getGetValue('TRANSTIME');

// store the date/time and order reference number provided by PayPal. May add more but this should be fine
switch ($payment_mode) {
    case 'donation':
        $sql = " UPDATE donations SET PPREF = ?, TRANSTIME = ? WHERE Id = ? ";
        break;
    case 'registration':
        $sql = " UPDATE registrations SET PPREF = ?, TRANSTIME = ? WHERE Id = ? ";
        break;
    case 'sponsor':
        $sql = " UPDATE sponsors SET PPREF = ?, TRANSTIME = ? WHERE Id = ? ";
        break;
}

// echo "sql = " . $sql . "<br />";
// echo "payment_mode = " . $payment_mode . "<br />";


$stmt = prepareStatement($mysqli, $sql);


// Bind the params
$stmt->bind_param("ssi", $PPREF, $TRANSTIME, $id);
        
// And run it
$stmt->execute();




// Get the user name and email based on payment_mode
switch ($payment_mode) {
    case 'donation':
        $sql = " SELECT name, email FROM donations WHERE Id = ? ";
        $payment_mode_friendly = 'Donation';
        break;
    case 'registration':
        $sql = " SELECT name, email FROM registrations_people WHERE form_order = 1 AND registration_id = ? ";
        $payment_mode_friendly = 'Registration';
        break;
    case 'sponsor':
        $sql = " SELECT name, email FROM sponsors WHERE Id = ? ";
        $payment_mode_friendly = 'Sponsorship';
        break;
}

// Make sure sql is ok
$stmt = prepareStatement($mysqli, $sql);

// Bind the id
// Bind the params
$stmt->bind_param("i", $id);


$stmt->execute();


// bind the name and email address
$stmt->bind_result($name, $email);

$stmt->fetch();


$strSubject = "EAL Golf Tournament - " . $payment_mode_friendly . " Confirmation";


// No header include here, need email friendly mark-up

$strBody = '<body style=" font-family:Arial; font-size:11pt;	">';
$strBody .= '<img src="http://ealgolftournament.com/assets/images/eal-logo.gif" alt="EAL Golf Tournament" style="width:250px; padding:3px; border:1px solid #94C33F;" /><br /><br />';

$strBody .= 'Dear ' . $name . '<br /><br />';

$strBody .= 'Thanks for your ' . $payment_mode_friendly . ' amount of $' . $payment_amount . '. We truly appreciate your support.<br /><br />';

$strBody .= '<strong>Order Summary:</strong><br /><br />';
$strBody .= 'Please retain for your records.<ul>';
$strBody .= '<li>' . $payment_mode_friendly . ' Id: ' . $id . '</li>';
$strBody .= '<li>PayPal Transaction Id: ' . $PPREF . '</li>';
$strBody .= '</ul>';

$strBody .= '<strong>Tournament Details:</strong><br /><br />';
$strBody .= 'Be sure to tell your friends!<ul>';
$strBody .= '<li>Date: Saturday, October 19<sup>th</sup> 2013</li>';
$strBody .= '<li>Registration: 11AM</li>';
$strBody .= '<li>Location: Hunter Golf Club - 688 Westfield Rd, Meriden, CT 06450</li>';
$strBody .= '<li>Website: <a href="http://ealgolftournament.com/">http://ealgolftournament.com/</a></li>';
$strBody .= '<li>Twitter: <a href="https://twitter.com/@EALGolfTourney">https://twitter.com/@EALGolfTourney</a></li>';
$strBody .= '</ul>';

$strBody .= '</body>';


// echo $strBody;


// Now send the email and redirect the opener to the thank you page.

// $strBody = implode("|", get_defined_vars());
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'Bcc: eriotte@gmail.com, EALGolfTournament@gmail.com' . "\r\n";
$headers .= 'From: EALGolfTournament@gmail.com' . "\r\n";

if ($GLOBALS['serverMode'] == "LIVE") {
    mail($email, $strSubject, $strBody, $headers, "");
} else {
    echo $strBody;
    die('Local version, no redirect');
}

// Order record is updated, email is sent
?>
<script language="javascript">
window.parent.location.replace('payment_thankYou.php');
</script>