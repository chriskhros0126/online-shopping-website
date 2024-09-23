<?php
    require_once '_database_connection.php';
    
    $_user = $_SESSION['user'] ?? null;

    function login($user, $url = '/') {
        $_SESSION['user'] = $user;
        header('Location: ' . $url);
        exit();
    }

    function logout($url = '/') {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        } else {
            unset($_SESSION['admin']);
        }
        header('Location: ' . $url);
        exit();
    }

    function is_logged_in() {
        return isset($_SESSION['user']);
    }

    function is_admin(){
        return isset($_SESSION['user']) && $_SESSION['user']['is_admin'];
    }

    function require_admin($redirect_url = '/login.php'){
        if (!is_admin()) {
            header('Location: ' . $redirect_url);
            exit();
        }
    }

    function require_login($redirect_url = '/login.php') {
        if (!is_logged_in()) {
            header('Location: ' . $redirect_url);
            exit();
        }
    }

    function refresh_session($pdo) {
        $temp = $_SESSION['user'];
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$temp['id']]);
        $user = $stmt->fetch();
        $_SESSION['user'] = $user;
    }

    function is_get() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    function is_post() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    function req($key, $value = null) {
        $val = $_REQUEST[$key] ?? $value;
        return is_array($val) ? array_map('trim', $val) : trim($val);
    }

    function is_email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    function is_exist($pdo, $email, $username) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        return $stmt->fetch() !== false;
    }

    function insert_user($pdo, $username, $email, $hashed_password) {
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            return $stmt->execute([$username, $email, $hashed_password]);
        } catch (PDOException $e) {
            error_log('Insert user failed: ' . $e->getMessage());
            return false;
        }
    }

    function encode($value) {
        return htmlentities($value);
    }

    function html_hidden($key, $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='hidden' id='$key' name='$key' value='$value' $attr>";
    }

    function html_options($options, $selected = '') {
        foreach($options as $key => $value) {
            $isSelected = ($key === $selected) ? ' selected' : '';
            echo '<option value="' . htmlspecialchars($key) . '"' . $isSelected . '>' . htmlspecialchars($value) . '</option>';
        }
    }

    function html_text($key, $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='text' id='$key' name='$key' value='$value' $attr>";
    }

    function html_email($key, $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='email' id='$key' name='$key' value='$value' $attr>";
    }

    function html_file($key, $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='file' id='$key' name='$key' value='$value' $attr>";
    }

    function html_password($key, $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='password' id='$key' name='$key' value='$value' $attr>";
    }

    function html_number($key, $min = '', $max = '', $step = '', $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='number' id='$key' name='$key' value='$value' min='$min' max='$max' step='$step' $attr>";
    }

    // Upload File
    function upload_profile_pic($pdo) {
        $file = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'asset/images/' . $file;
        $stmt = $pdo->prepare("UPDATE users SET image_path = ? WHERE id = ?");
        $stmt->execute([$folder, $_SESSION['user']['id']]);
        if (move_uploaded_file($tempname, $folder)) {
            echo "<script>alert('Uploaded Successfully.'); window.location.href = 'profile.php';</script>";
        } else {
            echo "<script>alert('File not Uploaded.'); window.location.href = 'profile.php';</script>";
        }
    }

    function change_password($pdo) {
        $current_password = req('current_password');
        $new_password = req('new_password');
        $confirm_password = req('confirm_password');
    
        // Check if the new passwords match
        if ($new_password !== $confirm_password) {
            echo "<script>alert('New passwords do not match.'); window.location.href = 'update_profile.php';</script>";
            return;
        }
    
        // Fetch the user's current password from the database
        $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user']['id']]);
        $user = $stmt->fetch();
    
        // Verify the current password
        if (!password_verify($current_password, $user['password'])) {
            echo "<script>alert('Current password is incorrect.'); window.location.href = 'update_profile.php';</script>";
            return;
        }
    
        // Hash the new password and update it in the database
        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        if ($stmt->execute([$new_hashed_password, $_SESSION['user']['id']])) {
            echo "<script>alert('Password updated successfully.'); window.location.href = 'update_profile.php';</script>";
        } else {
            echo "<script>alert('Failed to update password.'); window.location.href = 'update_profile.php';</script>";
        }
    }
?>
