<?php
require '../config/_base.php';

// Check if the user is logged in
if (!is_logged_in()) {
    header('Location: ../login.php');
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user']['id'];

// Check if cart_id is passed
if (isset($_GET['cart_id'])) {
    $cart_id = (int)$_GET['cart_id'];

    // Remove item from the cart
    $deleteSQL = "DELETE FROM cart WHERE cart_id = ? AND id = ?";
    $stmt = $conn->prepare($deleteSQL);
    $stmt->bind_param("ii", $cart_id, $user_id);
    
    if ($stmt->execute()) {
        // Redirect back to the cart page with a success message
        header('Location: ../cart.php?status=removed');
    } else {
        // Handle error
        header('Location: ../cart.php?status=error');
    }
} else {
    // Invalid request, cart_id missing
    header('Location: ../cart.php?status=invalid_request');
}
