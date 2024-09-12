<?php
    require 'config/_update_profile_base.php';
    include 'partials/_head.php';
?>
    <link rel="stylesheet" href="asset/css/login.css">
    <form action="update_admin_profile.php" method="post" enctype="multipart/form-data">
        <h2>Update Profile</h2>
        <label for="email">Email</label>
        <?php html_email("email") ?>

        <label for="username">Username</label>
        <?php html_text("username") ?>

        <label for="image">Profile Image</label>
        <input type="file" id="image" name="image">

        <button type="submit">Submit</button>
        <a href="profile.php">Back to Profile</a>
    </form>

<?php
    include 'partials/_footer.php';