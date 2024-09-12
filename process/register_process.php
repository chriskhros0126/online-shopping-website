<?php
include('../config/_base.php'); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password match check
    if ($password !== $confirm_password) {
        echo "<script>
                alert('Passwords do not match.'); 
                window.location.href = '../register.php';
            </script>";
        die();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the username or email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    if ($stmt->fetch()) {
        echo "<script>
            alert('Users with this email or username already exists.'); 
            window.location.href = '../register.php';
        </script>";
        die();
    }

    // Insert the new user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $hashed_password])) {
        echo "<script>
            alert('Registration succesful!'); 
            window.location.href = '../login.php';
        </script>";
    } else {
        echo "<script>
            alert('Registration failed, Try again!'); 
            window.location.href = '../register.php';
        </script>";
    }
}
?>
