<?php
include('config/_base.php');

// Check if the logged-in user is an admin
if (!isset($_SESSION['user']) || !$_SESSION['user']['is_admin']) {
    header('Location: login.php');
    exit();
}

echo "<h1>Welcome to the Admin Dashboard</h1>";
// Add additional admin functionalities here
?>
