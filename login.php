<?php include('config/_base.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/main.css">
    <title>Register - Alpha</title>
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <?php
    // Initialize variables to hold form data and errors
    $username = $email = $password = $confirm_password = '';
    $_err = [];

    // Check if the form is submitted
    if (is_post()) {
        // Get form data
        $username = post('username');
        $email = post('email');
        $password = post('password');
        $confirm_password = post('confirm_password');

        // Validate form data
        if (!$username) {
            $_err['username'] = 'Username is required';
        }
        if (!$email || !is_email($email)) {
            $_err['email'] = 'Valid email is required';
        }
        if (!$password) {
            $_err['password'] = 'Password is required';
        }
        if ($password !== $confirm_password) {
            $_err['confirm_password'] = 'Passwords do not match';
        }

        // If no errors, insert the user into the database
        if (empty($_err)) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL statement
            $stmt = $_db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$username, $email, $hashed_password])) {
                // Registration successful, redirect to login
                redirect('login.php');
            } else {
                echo '<p>Registration failed. Please try again later.</p>';
            }
        }
    }
    ?>

    <form action="register.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <?php html_text('username'); ?>
            <?php err('username'); ?>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <?php html_text('email'); ?>
            <?php err('email'); ?>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <?php html_password('password'); ?>
            <?php err('password'); ?>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <?php html_password('confirm_password'); ?>
            <?php err('confirm_password'); ?>
        </div>

        <div class="form-group">
            <button type="submit">Register</button>
        </div>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</div>

</body>
</html>
