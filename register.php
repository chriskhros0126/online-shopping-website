<?php
    require 'config/_register_base.php';
    include 'partials/_head.php';
?>
    <link rel="stylesheet" href="asset/css/register.css">
    <form action="register.php" method="POST">
        <h2>Register</h2>
        <label for="username">Username</label>
        <?php html_text("username","required") ?>

        <label for="email">Email</label>
        <?php html_email("email","required") ?>

        <label for="password">Password</label>
        <?php html_password("password","required") ?>

        <label for="confirm_password">Confirm Password</label>
        <?php html_password("confirm_password","required") ?>

        <button type="submit">Register</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>

<?php
    include 'partials/_footer.php';