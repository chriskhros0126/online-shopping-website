<?php
require 'config/_base.php';
include 'partials/_head.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Fetch the reset request
    $stmt = $pdo->prepare("SELECT * FROM admin_password_resets WHERE token = ? AND expires >= ?");
    $stmt->execute([$token, time()]);
    $resetRequest = $stmt->fetch();

    if ($resetRequest) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newPassword = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword === $confirmPassword) {
                // Hash the new password and update the user record
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("UPDATE admin_users SET password = ? WHERE email = ?");
                $stmt->execute([$hashedPassword, $resetRequest['email']]);

                // Delete the token from the password_resets table
                $stmt = $pdo->prepare("DELETE FROM admin_password_resets WHERE email = ?");
                $stmt->execute([$resetRequest['email']]);

                echo "<script>alert('Password reset successful!'); window.location.href = 'admin_login.php';</script>";
            } else {
                echo "<script>alert('Passwords do not match!');</script>";
            }
        }
    } else {
        echo "<script>alert('Invalid or expired token!'); window.location.href = 'admin_forgot_password.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href = 'admin_forgot_password.php';</script>";
}
?>

<!-- Reset Password Form -->
<link rel="stylesheet" href="asset/css/login.css">
<form action="" method="post">
    <h2>Reset Password</h2>
    <label for="password">New Password</label>
    <input type="password" name="password" id="password" required>

    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password" required>

    <button type="submit">Reset Password</button>
</form>
