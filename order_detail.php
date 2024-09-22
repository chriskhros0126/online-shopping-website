<?php
require 'config/_base.php';

// Check if the user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

// Get the order ID from the URL
$order_id = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;

// Fetch the order details
$sql_order = "SELECT * FROM orders WHERE order_id = ? AND user_id = ?";
$stmt_order = $conn->prepare($sql_order);
$stmt_order->bind_param("ii", $order_id, $_SESSION['user']['id']);
$stmt_order->execute();
$result_order = $stmt_order->get_result();

if ($result_order->num_rows == 0) {
    echo "Order not found!";
    exit;
}

$order = $result_order->fetch_assoc();

// Fetch the items for the order
$sql_items = "SELECT oi.order_item_id, w.sub_model, w.image_path, oi.price 
              FROM order_items oi 
              JOIN watches w ON oi.watch_id = w.watch_id 
              WHERE oi.order_id = ?";
$stmt_items = $conn->prepare($sql_items);
$stmt_items->bind_param("i", $order_id);
$stmt_items->execute();
$result_items = $stmt_items->get_result();

include 'partials/_head.php';
?>

<link rel="stylesheet" href="asset/css/order.css">
<link rel="stylesheet" href="asset/css/shop.css">

<h2>Order Details</h2>

<div class="main-order">
    <div class="order-container">
        <p><strong>Date:</strong> <?php echo htmlspecialchars($order['order_date']); ?></p>
        <p><strong>Total Price:</strong> RM<?php echo number_format($order['total_price'], 2); ?></p>
        <p><strong>Status:</strong> <?php echo htmlspecialchars($order['status']); ?></p>

        <h4>Items in this Order:</h4>
        <table>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
            </tr>
            <?php while ($item = $result_items->fetch_assoc()): ?>
                <tr>
                    <td><img src="asset/<?php echo htmlspecialchars($item['image_path']); ?>" alt="<?php echo htmlspecialchars($item['sub_model']); ?>" class="order-item-image"></td>
                    <td><?php echo htmlspecialchars($item['sub_model']); ?></td>
                    <td>RM<?php echo number_format($item['price'], 2); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>

<?php
include 'partials/_footer.php';
?>
