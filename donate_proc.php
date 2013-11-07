<?php

require('assets/php/functions.php');
require('assets/php/variables.php');
require('assets/php/paypal.php');


session_start(); // This page will store session variables for the payment screen.

// This page will store all info for a registration


$name = getPostValue('name');
$amount = getPostValue('amount');
$address = getPostValue('address');
$city_state = getPostValue('city_state'); 
$email = getPostValue('email');
$phone = getPostValue('phone');
$message = getPostValue('message');


// Validate the email. If it fails, send them back with an alert
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Please make sure your email address is valid.'); history.go(-1); </script>";   
    exit();
}
    

// Create an inserto statement. This is a two phase process, kind of strange but safer I guess
$sql = " INSERT INTO donations ( submitted_at, name, amount, address, city_state, email, phone, message ) VALUES ( NOW(), ?, ?, ?, ?, ?, ?, ? ) ; ";
$stmt = prepareStatement($mysqli, $sql);

// Bind the params
$stmt->bind_param("sdsssss", $name, $amount, $address, $city_state, $email, $phone, $message);
        

// Execute the above statement, and get our registration_id
executeStatement($stmt);
$donation_id = $mysqli->insert_id;

// echo "registration_id = $registration_id<br />";


// Store registration_id and payment_amount as session variables
$_SESSION['donation_id'] = $donation_id;
$_SESSION['payment_amount'] = $amount;
$_SESSION['payment_mode'] = 'donation'; // One form will have payPayl iframe, send it some info 

$_SESSION['SECURETOKENID'] = '2013_' . $_SESSION['payment_mode'] . '_' . $donation_id . '_' . $serverMode;

// Now connect to paypal and request a transaction. I'm not sure if I should do it here later. 
// Note, user has 30 minutes to complete the transaction


$_SESSION['SECURETOKEN'] = ppGetSecureToken($amount, $_SESSION['SECURETOKENID'], $name, $email, "Donation");


header('location: payment.php');

?>