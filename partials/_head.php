<?php include('config/_base.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/main.css">
    <title>Alpha</title>
</head>

<div class="header">
    <!-- LOGO -->
    <div class="left">
        <a href="index.php"><h1>Alpha</h1></a>
    </div>
    
    <div class="right">
        <?php if (is_logged_in()) { ?>
                <?php if ($_SESSION['user']['is_admin']) { ?>
                    <a href="admin_dashboard.php">Admin Dashboard</a>
                <?php } ?>
               <a href="profile.php">Profile</a>
               <a href="cart.php">Cart (0)</a>
               <a href="logout.php">Logout</a> <!-- Option to log out -->
        <?php } else { ?>
               <a href="login.php">Login</a>
               <a href="register.php">Register</a>
               <a href="cart.php">Cart (0)</a>
        <?php } ?>
    </div>
</div>
