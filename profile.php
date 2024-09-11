<?php
include('config/_base.php');
require_login();  // Ensure user is logged in before accessing the page

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']['username']; ?></h1>
    <p>Email: <?php echo $_SESSION['user']['email']; ?></p>

    <a href="logout.php">Logout</a>
</body>
</html>
