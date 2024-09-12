<?php
    require '_base.php';
    refresh_session($pdo);

    $image_path = $_SESSION['user']['image_path'];
    $email = $_SESSION['user']['email'];
    $username = $_SESSION['user']['username'];
    $date = $_SESSION['user']['created_at'];