<?php
include('../config/_base.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verify the password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user; 
        header('Location: ../index.php');
        exit();
    } else {
        echo "<script>
        alert('Invalid email or password.');
        window.location.href = '../login.php'
        </script>";

    }
}
?>