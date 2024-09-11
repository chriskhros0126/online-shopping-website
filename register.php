<html>

<header>
    <?php include('partials/_head.php'); ?>
    <link rel="stylesheet" href="asset/css/register.css">
</header>

<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <button type="submit">Register</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
    <?php include('partials/_footer.php'); ?>   
</body>
</html>
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

    // Insert the new user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $hashed_password])) {
        echo "Registration successful!";
        // Redirect to login page
        header('Location: login.php');
        exit();
    } else {
        echo "Registration failed.";
    }
}
?>
