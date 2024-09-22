<?php
require '../config/_base.php';

// Check if the user is logged in
if (!is_logged_in()) {
    header('Location: ../login.php');
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user']['id'];

// Check if the watch_id is passed
if (isset($_GET['watch_id'])) {
    $watch_id = (int)$_GET['watch_id'];

    // Item not in cart, insert into the cart table
    $insertCartSQL = "INSERT INTO cart (id, watch_id) VALUES (?, ?)";
    $stmt = $conn->prepare($insertCartSQL);
    $stmt->bind_param("ii", $user_id, $watch_id);
    
    if ($stmt->execute()) {
        // Redirect back to the shop page with success message
        header('Location: ../cart.php?status=added_to_cart');
    } else {
        // Handle error in case of a failed query
        header('Location: ../cart.php?status=error');
    }

} else {
    // Invalid request, watch_id missing
    header('Location: ../cart.php?status=invalid_request');
}
