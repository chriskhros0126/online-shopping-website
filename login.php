<html>
<header>
    <?php include('partials/_head.php'); ?>
    <link rel="stylesheet" href="asset/css/login.css">
</header>

<body>
    <h2>Login</h2>
    <form action="process/login_process.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
        <p>Dont have an account? <a href="register.php">Register</a></p>
        <p><a href="fotgot_password.php">Forgot password</a></p>
    </form>
</body>
</html>



