<?php

require('assets/php/functions.php');
require('assets/php/variables.php');
require('assets/php/paypal.php');


session_start(); // This page will store session variables for the payment screen.

// This page will store all info for a registration

$payment_amount = 0;    // I will calc this, dont want to get it from the front end. This frustrates me, pricing is very spread out



// Create an inserto statement. This is a two phase process, kind of strange but safer I guess
$sql = " INSERT INTO registrations ( submitted_at ) VALUES ( NOW() ) ; ";
$stmt = prepareStatement($mysqli, $sql);

// Execute the above statement, and get our registration_id
executeStatement($stmt);
$registration_id = $mysqli->insert_id;

// echo "registration_id = $registration_id<br />";

// Now prepare the insert statement 1 time, out of the loop
$sql = " INSERT INTO registrations_people ( registration_id, name, type, address, city_state, email, phone, form_order ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ? ) ; ";
$stmt = prepareStatement($mysqli, $sql);


for ($i = 1; $i <=4; $i += 1) {
    
    $name = getPostValue('name_' . $i);
    $type = getPostValue('registration_type_' . $i);
    $address = getPostValue('address_' . $i);
    $city_state = getPostValue('city_state_' . $i); 
    $email = getPostValue('email_' . $i);
    $phone = getPostValue('phone_' . $i);
    
    if ($name != "" && $type != "") {
        
        // these are just like sql query params, i = integer, s = string, b = text / blob
        $stmt->bind_param("issssssi", $registration_id, $name, $type, $address, $city_state, $email, $phone, $i);
        
        executeStatement($stmt);
        
        // echo "$i: name = $name, type = $type, address = $address, city_state = $city_state, email = $email, phone = $phone<br />";
        
        if ($type == "Player") { 
            $payment_amount += $cost_player; 
        } elseif ($type == "Guest") {
            $payment_amount += $cost_guest; 
        }
    
        
    }
}

$message = getPostValue('message');

// Store the payment amount and message
$sql = " UPDATE registrations SET payment_amount = ?, message = ? WHERE Id = ? ";
$stmt = prepareStatement($mysqli, $sql);

// Bind the params
$stmt->bind_param("dsi", $payment_amount, $message, $registration_id);
        
// And run it
$stmt->execute();




// Reset name and email for paypal records
$name = getPostValue('name_1');
$email = getPostValue('email_1');
    

// Store registration_id and payment_amount as session variables
$_SESSION['registration_id'] = $registration_id;
$_SESSION['payment_amount'] = $payment_amount;
$_SESSION['payment_mode'] = 'registration'; // One form will have payPayl iframe, send it some info 

$_SESSION['SECURETOKENID'] = '2013_' . $_SESSION['payment_mode'] . '_' . $registration_id . '_' . $serverMode;

// Now connect to paypal and request a transaction. I'm not sure if I should do it here later. 
// Note, user has 30 minutes to complete the transaction


$_SESSION['SECURETOKEN'] = ppGetSecureToken($payment_amount, $_SESSION['SECURETOKENID'], $name, $email, "Registration" );


header('location: payment.php');

?>