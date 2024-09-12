<?php
    require '_base.php';
    $GLOBALS['username'] = $_SESSION['user']['username'] ;
    $GLOBALS['email'] = $_SESSION['user']['email'] ;
    if(is_post()){
        $file = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'asset/images/'.$file;
        $stmt = $pdo->prepare("UPDATE users SET image_path = ? WHERE id = ?");
        $result = $stmt->execute([$folder,$_SESSION['user']['id']]);

        if(move_uploaded_file($tempname,$folder)){
            echo "<script>
                alert('Uploaded Succesfully.');
                window.location.href = '../profile.php'
            </script>";
        }else{
            echo "<script>
                alert('File not Uploaded.');
                window.location.href = '../profile.php'
            </script>";
        }
        
    }
?>