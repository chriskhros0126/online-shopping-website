<?php
include_once('config/_base.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password match check
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the username or email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    if ($stmt->fetch()) {
        die("User with this email or username already exists.");
    }

    // Insert the new admin user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, is_admin) VALUES (?, ?, ?, 1)"); // Note the '1' for is_admin
    if ($stmt->execute([$username, $email, $hashed_password])) {
        echo "Admin registration successful!";
        header('Location: admin_login.php'); // Redirect to admin login page
        exit();
    } else {
        echo "Admin registration failed.";
    }
}
?>
