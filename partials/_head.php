<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="header">
        <!-- LOGO -->
        <div class="left">
            <a href="index.php"><h1>Alpha</h1></a>
        </div>
        
        <div class="right">
            <?php if (is_logged_in()) { ?>
                <?php if ($_SESSION['user']['is_admin']) { ?>
                    <a href="admin_dashboard.php">Member Listings</a>
                    <a href="profile.php">Profile</a>
                    <a href="logout.php">Logout</a>
                <?php }else{ ?>
                    <a href="profile.php">Profile</a>
                    <a href="cart.php">Cart</a>
                    <a href="logout.php">Logout</a>
                <?php } ?>
            <?php } else { ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
                <a href="shop.php">Shop</a>
            <?php } ?>
        </div>
    </div>