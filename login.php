<html>
<header>
    <?php include('partials/_head.php'); ?>
    <link rel="stylesheet" href="asset/css/login.css">
</header>

<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
        <p>Dont have an account? <a href="register.php">Register</a></p>
        <p>Forgot password? <a href="register.php">Register</a></p>
    </form>
    <?php include('partials/_footer.php'); ?>
</body>
</html>

<?php
include('config/_base.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verify the password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user; // Store user information in the session

        // Check if the user is an admin
        if ($user['is_admin']) {
            header('Location: admin_dashboard.php'); // Redirect to admin dashboard
        } else {
            header('Location: index.php'); // Redirect to regular user home page
        }
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>

