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
    function is_get() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

// Is POST request? (define only if it doesn't exist)
    function is_post() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }


    function is_set($var){
        return isset($var) && !empty($var);
    }

// Is email?
function is_email($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
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

// ============================================================================
// Cart Functionality
// ============================================================================

// Add to cart function
if (!function_exists('add_to_cart')) {
    function add_to_cart($watch_id, $quantity) {
        global $conn;
        // Check if user is logged in
        if (!is_logged_in()) {
            // Redirect to login page if user is not logged in
            echo "<script>
            alert('Invalid email or password.');
            window.location.href = '../login.php'
            </script>";
        }

        // Get the logged-in user's ID from the session
        $user_id = $_SESSION['user']['user_id'];

        // Check if the item is already in the cart
        $checkCartSQL = "SELECT * FROM cart WHERE user_id = ? AND watch_id = ?";
        $stmt = $conn->prepare($checkCartSQL);
        $stmt->bind_param('ii', $user_id, $watch_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // If the item already exists in the cart, update the quantity
            $updateCartSQL = "UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND watch_id = ?";
            $updateStmt = $conn->prepare($updateCartSQL);
            $updateStmt->bind_param('iii', $quantity, $user_id, $watch_id);
            $updateStmt->execute();
        } else {
            // If the item doesn't exist in the cart, insert a new row
            $insertCartSQL = "INSERT INTO cart (user_id, watch_id, quantity) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertCartSQL);
            $insertStmt->bind_param('iii', $user_id, $watch_id, $quantity);
            $insertStmt->execute();
        }

        // Redirect to cart page or display a success message
        header('Location: cart.php');  // Redirect to the cart page after adding
        exit();
    }
}

?>