<?php
require '_base.php';
$GLOBALS['username'] = $_SESSION['user']['username'];
$GLOBALS['email'] = $_SESSION['user']['email'];

if (is_post()) {
    if (isset($_POST['update_profile'])) {
        // Handle profile update (like image upload)
        upload_profile_pic($pdo);
    } elseif (isset($_POST['change_password'])) {
        change_password($pdo);
    }
}
?>
