<?php
// ============================================================================
// Database Setups and Functions
// ============================================================================
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$host = 'localhost';     
$db   = 'dbonlineshoppingwebsite';
$user = 'root';
$pass = '';

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ============================================================================
// Security
// ============================================================================

// Global user object
$_user = $_SESSION['user'] ?? null;

// Login user (define only if it doesn't exist)
if (!function_exists('login')) {
    function login($user, $url = '/') {
        $_SESSION['user'] = $user;
        header('Location: ' . $url);
        exit();
    }
}

// Logout user (define only if it doesn't exist)
if (!function_exists('logout')) {
    function logout($url = '/') {
        unset($_SESSION['user']);
        header('Location: ' . $url);
        exit();
    }
}

// Check if the user is logged in (define only if it doesn't exist)
if (!function_exists('is_logged_in')) {
    function is_logged_in() {
        return isset($_SESSION['user']);
    }
}

// Middleware to check if user is logged in (define only if it doesn't exist)
if (!function_exists('require_login')) {
    function require_login($redirect_url = '/login.php') {
        if (!is_logged_in()) {
            header('Location: ' . $redirect_url);
            exit();
        }
    }
}

// ============================================================================
// General Page Functions
// ============================================================================

// Is GET request? (define only if it doesn't exist)
if (!function_exists('is_get')) {
    function is_get() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
}

// Is POST request? (define only if it doesn't exist)
if (!function_exists('is_post')) {
    function is_post() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
}

// ============================================================================
// HTML Helpers
// ============================================================================

// Encode HTML special characters (define only if it doesn't exist)
if (!function_exists('encode')) {
    function encode($value) {
        return htmlentities($value);
    }
}

// Generate <input type='hidden'> (define only if it doesn't exist)
if (!function_exists('html_hidden')) {
    function html_hidden($key, $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='hidden' id='$key' name='$key' value='$value' $attr>";
    }
}

// Generate <input type='text'> (define only if it doesn't exist)
if (!function_exists('html_text')) {
    function html_text($key, $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='text' id='$key' name='$key' value='$value' $attr>";
    }
}

// Generate <input type='password'> (define only if it doesn't exist)
if (!function_exists('html_password')) {
    function html_password($key, $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='password' id='$key' name='$key' value='$value' $attr>";
    }
}

// Generate <input type='number'> (define only if it doesn't exist)
if (!function_exists('html_number')) {
    function html_number($key, $min = '', $max = '', $step = '', $attr = '') {
        $value = encode($GLOBALS[$key] ?? '');
        echo "<input type='number' id='$key' name='$key' value='$value'
                     min='$min' max='$max' step='$step' $attr>";
    }
}
?>
