<?php
require '../config/_base.php';

if (!is_logged_in()) {
    header('Location: ../login.php');
    exit;
}

$user_id = $_SESSION['user']['id'];

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$total_price = $_POST['total_price'];

// Payment card details (Note: NEVER store these in production)
$card_number = $_POST['card_number'];
$expiry_date = $_POST['expiry_date'];
$cvv = $_POST['cvv'];

// Start transaction
$conn->begin_transaction();

try {
    // Insert into orders table
    $orderSQL = "INSERT INTO orders (user_id, total_price, name, email, address) 
                 VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($orderSQL);
    $stmt->bind_param('idsss', $user_id, $total_price, $name, $email, $address);
    $stmt->execute();
    
    $order_id = $conn->insert_id;

    // Insert items into order_items table
    $cartSQL = "SELECT c.watch_id, w.price 
            FROM cart c 
            JOIN watches w ON c.watch_id = w.watch_id 
            WHERE c.id = ?";
    $stmt = $conn->prepare($cartSQL);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $orderItemSQL = "INSERT INTO order_items (order_id, watch_id, price) 
                         VALUES (?, ?, ?)";
        $stmt = $conn->prepare($orderItemSQL);
        $stmt->bind_param('iid', $order_id, $row['watch_id'], $row['price']);
        $stmt->execute();
    }

    // Clear cart
    $clearCartSQL = "DELETE FROM cart WHERE id = ?";
    $stmt = $conn->prepare($clearCartSQL);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Commit transaction
    $conn->commit();

    header('Location: ../thank_you.php');
} catch (Exception $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}
?>
