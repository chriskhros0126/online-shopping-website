<?php
    require 'config/_update_profile_base.php';
    include 'partials/_head.php';
?>
    <link rel="stylesheet" href="asset/css/login.css">
    <form action="update_profile.php" method="post" enctype="multipart/form-data">
        <h2>Update Profile</h2>

        <label for="email">Email</label>
        <?php html_email("email") ?>

        <label for="username">Username</label>
        <?php html_text("username") ?>

        <label for="image">Profile Image</label>
        <input type="file" id="image" name="image">

        <button type="submit" name="update_profile">Submit</button>
    </form>

    <!-- Change Password Section -->
    <form action="update_profile.php" method="post">
        <h2>Change Password</h2>

        <label for="current_password">Current Password</label>
        <input type="password" id="current_password" name="current_password" required>

        <label for="new_password">New Password</label>
        <input type="password" id="new_password" name="new_password" required>

        <label for="confirm_password">Confirm New Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit" name="change_password">Change Password</button>
    </form>

<?php
    include 'partials/_footer.php';
?>
