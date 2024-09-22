<?php
require 'config/_base.php';

// Check if the user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

// Get the logged-in user's ID
$user_id = $_SESSION['user']['id'];

// Fetch the order history for the logged-in user
$sql_orders = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC";
$stmt_orders = $conn->prepare($sql_orders);
$stmt_orders->bind_param("i", $user_id);
$stmt_orders->execute();
$result_orders = $stmt_orders->get_result();

include 'partials/_head.php';
?>

<link rel="stylesheet" href="asset/css/order.css">
<link rel="stylesheet" href="asset/css/shop.css">

<h2>Your Order History</h2>

<div class="main-order">
    <div class="order-container">
        <?php if ($result_orders->num_rows > 0): ?>
            <table>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php $count = 1; ?>
                <?php while ($row_order = $result_orders->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo htmlspecialchars($row_order['order_date']); ?></td>
                        <td>RM<?php echo number_format($row_order['total_price'], 2); ?></td>
                        <td><?php echo htmlspecialchars($row_order['status']); ?></td>
                        <td>
                            <a href="order_detail.php?order_id=<?php echo $row_order['order_id']; ?>" class="detail-btn">View Details</a>
                        </td>
                    </tr>
                <?php $count++; ?>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>You have no orders in your history.</p>
        <?php endif; ?>
    </div>
</div>

<?php
include 'partials/_footer.php';
?>
