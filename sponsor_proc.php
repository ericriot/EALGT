<?php

require('assets/php/functions.php');
require('assets/php/variables.php');
require('assets/php/paypal.php');


session_start(); // This page will store session variables for the payment screen.

// This page will store all info for a registration


$name = getPostValue('name');
$name_contact = getPostValue('name_contact');
$level = getPostValue('level');
$address = getPostValue('address');
$city_state = getPostValue('city_state'); 
$email = getPostValue('email');
$phone = getPostValue('phone');
$message = getPostValue('message');


switch ($level) {
case "Platinum Sponsor":
    $payment_amount = 2500;
    break;
case "Gold Sponsor":
    $payment_amount = 1000;
    break;
case "Silver Sponsor":
    $payment_amount = 500;
    break;
case "Longest Drive Sponsor":
    $payment_amount = 250;
    break;
case "Closest to the Pin Sponsor":
    $payment_amount = 250;
    break;
case "Tee Sponsor":
    $payment_amount = 125;
    break;
default:
    $payment_amount = 0;
    break;
}
    
    

// Create an inserto statement. This is a two phase process, kind of strange but safer I guess
$sql = " INSERT INTO sponsors ( submitted_at, name, name_contact, address, city_state, phone, email, sponsor_level, message, payment_amount ) "
    . " VALUES ( NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ? ) ; ";
$stmt = prepareStatement($mysqli, $sql);

// Bind the params
$stmt->bind_param("ssssssssd", $name, $name_contact, $address, $city_state, $phone, $email, $level, $message, $payment_amount);
        

// Execute the above statement, and get our registration_id
executeStatement($stmt);
$sponsor_id = $mysqli->insert_id;

// echo "registration_id = $registration_id<br />";


// Store registration_id and payment_amount as session variables
$_SESSION['sponsor_id'] = $sponsor_id;
$_SESSION['payment_amount'] = $payment_amount;
$_SESSION['payment_mode'] = 'sponsor'; // One form will have payPayl iframe, send it some info 

$_SESSION['SECURETOKENID'] = '2013_' . $_SESSION['payment_mode'] . '_' . $sponsor_id . '_' . $serverMode;

// Now connect to paypal and request a transaction. I'm not sure if I should do it here later. 
// Note, user has 30 minutes to complete the transaction


$_SESSION['SECURETOKEN'] = ppGetSecureToken($payment_amount, $_SESSION['SECURETOKENID'], $name, $email, $level );

// echo ('payment_amount = ' . $payment_amount);

// Close our db connection
$mysqli->close();


header('location: payment.php');

?>