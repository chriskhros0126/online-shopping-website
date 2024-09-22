<?php
    require 'config/_login_base.php';
    include 'partials/_head.php';
?>
    <link rel="stylesheet" href="asset/css/login.css">
    <form action="login.php" method="post">
        <h2>Login</h2>
        <label for="email">Email</label>
        <?php html_email("email","required") ?>

        <label for="password">Password</label>
        <?php html_password("password","required") ?>

        <button type="submit">Login</button>
        <p>Dont have an account? <a href="register.php">Register</a></p>
        <p><a href="forgot_password.php">Forgot password</a></p>
    </form>
<?php
    include 'partials/_footer.php';