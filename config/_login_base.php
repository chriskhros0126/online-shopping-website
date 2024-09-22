<?php
    require_once '_base.php'; // Ensure it's only included once

    if (is_post()) {
        $email = req('email');
        $password = req('password');

        if (!is_email($email)) {
            echo "<script>
                alert('Invalid email.');
                window.location.href = 'login.php';
            </script>";
            exit();
        }

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            if ($user['is_admin']) {
                header('Location: admin/product_list.php');
            } else {
                header('Location: shop.php');
            }
            exit();
        } else {
            echo "<script>
                alert('Invalid password.');
                window.location.href = 'login.php';
            </script>";
            exit();
        }
    }
?>
