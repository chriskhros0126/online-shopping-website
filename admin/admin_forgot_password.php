<?php
require 'config/_base.php';
include 'partials/_head.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the users table
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Generate a token (could be a random string)
        $token = bin2hex(random_bytes(16)); // Generate a random 32 character token
        $expires = time() + 3600; // Token expires in 1 hour

        // Insert token into the password_resets table
        $stmt = $pdo->prepare("INSERT INTO admin_password_resets (email, token, expires) VALUES (?, ?, ?)");
        $stmt->execute([$email, $token, $expires]);

        // Display the reset link (instead of emailing it)
        echo "Reset link: <a href='admin_reset_password.php?token=$token'>Click here to reset your password</a>";
    } else {
        echo "No user found with that email address.";
    }
}
?>
<link rel="stylesheet" href="asset/css/login.css">
<!-- Forgot Password Form -->
<form action="" method="post">
    <h2>Forgot Password</h2>
    <label for="email">Enter your email address</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Send Reset Link</button>
</form>
