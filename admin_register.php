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
    <title>Admin Register</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <form action="process/admin_register_process.php" method="POST">
        <h2>Admin Register</h2>
        
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Register</button>
        <p><a href="admin_login.php">Already have an account? Login</a></p>
    </form>
</body>
</html>
