<?php

session_start(); // This page will use the session variables




// We're good, back to the regular setup
$payment_amount = $_SESSION['payment_amount'];

?>
<?php include('assets/php/header.php'); ?>

    <h3>Payment Cancel Page</h3>

    <p>User Chickened Out.</p>
    


<?php require('assets/php/footer.php'); ?>
