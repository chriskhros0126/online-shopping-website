<?php
    session_start();
    require 'config/_login_base.php';
    include 'partials/_head.php';
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="asset/css/login.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <form action="process/admin_login_process.php" method="POST">
        <h2>Admin Login</h2>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Login</button>
        <p><a href="admin_register.php">Register as Admin</a></p>
        <p><a href="admin_forgot_password.php">Forgot password?</a></p>
    </form>
</body>
</html>
