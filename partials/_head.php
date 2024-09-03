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
        <?php if(is_logged_in()){ ?>
               <a href="profile.php">Profile</a>
               <a href="cart.php">Cart (0)</a>
        <?php }else{ ?>
                <a href="login.php">Profile</a>
                <a href="register.php">Cart (0)</a>
        <?php } ?>
     
    </div>
</div>

