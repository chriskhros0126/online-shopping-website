<?php
require 'config/_base.php';

// Check if the user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

include 'partials/_head.php';
?>

<link rel="stylesheet" href="asset/css/thank_you.css">
<link rel="stylesheet" href="asset/css/shop.css">

<div class="thank-you-container">
    <h1>Thank You!</h1>
    <p>Your order has been placed successfully.</p>
    <p>We appreciate your business and will send a confirmation email with your order details shortly.</p>
    
    <div class="order-summary">
        <h2>Order Summary</h2>
        <p>If you have any questions about your order, feel free to <a href="contact.php">contact us</a>.</p>
        <a href="shop.php" class="btn-shop">Continue Shopping</a>
    </div>
</div>

<?php
include 'partials/_footer.php';
?>
