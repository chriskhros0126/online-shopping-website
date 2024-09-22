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

    header("Location: ../checkout.php?watch_id=$watch_id");
} else {
    // Invalid request, watch_id missing
    header('Location: ../shop.php?status=invalid_request');
}
