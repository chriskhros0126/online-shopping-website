<?php
    require '_base.php';
    if (is_post()) {
        $username = req('username');
        $email = req('email');
        $password = req('password');
        $confirm_password = req('confirm_password');
    
        // Password match check
        if ($password !== $confirm_password) {
            echo "<script>
                    alert('Passwords do not match.'); 
                    window.location.href = 'register.php';
                </script>";
            die();
        }else{
            if(is_exist($pdo,$email,$username)){
                echo "<script>
                    alert('Users with this email or username already exists.'); 
                    window.location.href = 'register.php';
                </script>";
                die();
            }else{
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                insert_user($pdo,$username,$email,$hashed_password);
                echo "<script>
                    alert('Registration succesful!'); 
                    window.location.href = 'login.php';
                </script>";
                die();
            }
        }
    }