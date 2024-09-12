<?php
    require '_database_connection.php';

    $_user = $_SESSION['user'] ?? null;
    function login($user, $url = '/') {
        $_SESSION['user'] = $user;
        header('Location: ' . $url);
        exit();
    }
    function logout($url = '/') {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }else{
            unset($_SESSION['admin']);
        }
        header('Location: ' . $url);
        exit();
    }
    function is_logged_in() {
        return isset($_SESSION['user']);
    }
    function require_login($redirect_url = '/login.php') {
        if (!is_logged_in()) {
            header('Location: ' . $redirect_url);
            exit();
        }
    }
    function refresh_session($pdo){
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
    function is_exist($pdo,$email,$username){
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        return $stmt->fetch() !== false;
    }
    function insert_user($pdo,$username,$email,$hashed_password){
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $result = $stmt->execute([$username, $email, $hashed_password]);
            return $result;
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
    function html_options($options,$selected=''){
        foreach($options as $key=>$value){
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
    function html_file($key, $attr = ''){
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='file' id='$key' name='$key' value='$value' $attr>";
    }
    function html_password($key, $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='password' id='$key' name='$key' value='$value' $attr>";
    }
    function html_number($key, $min = '', $max = '', $step = '', $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='number' id='$key' name='$key' value='$value'
                    min='$min' max='$max' step='$step' $attr>";
    }
