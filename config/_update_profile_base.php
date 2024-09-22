<?php
    require '_base.php';
    $GLOBALS['username'] = $_SESSION['user']['username'] ;
    $GLOBALS['email'] = $_SESSION['user']['email'] ;
    if(is_post()){
        upload_profile_pic($pdo); 
    }
?>