<?php
    include 'partials/_header_admin.php';
?>
<link rel="stylesheet" href="../asset/css/shop.css">
<link rel="stylesheet" href="../asset/css/admin_orders.css">
<link rel="stylesheet" href="../asset/css/admin_view_order.css">

<div class="main">
    <?php include('partials/_sidebar_admin.php') ?>

    <div class="content-wrapper">
        <div class="container" id="order-container">
            <?php
            // Get the order ID from the URL
            $order_id = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;

            // Fetch the order details
            $sql_order = "SELECT * FROM orders WHERE order_id = ?";
            $stmt_order = $conn->prepare($sql_order);
            $stmt_order->bind_param("i", $order_id);
            $stmt_order->execute();
            $result_order = $stmt_order->get_result();

            if ($result_order->num_rows == 0) {
                echo "<p>Order not found!</p>";
                exit;
            }

            $order = $result_order->fetch_assoc();

            // Fetch the items for the order
            $sql_items = "SELECT oi.order_item_id, w.sub_model, w.image_path, oi.price , o.*
                          FROM order_items oi 
                          JOIN orders o ON o.order_id = oi.order_id
                          JOIN watches w ON oi.watch_id = w.watch_id 
                          WHERE oi.order_id = ?";
            $stmt_items = $conn->prepare($sql_items);
            $stmt_items->bind_param("i", $order_id);
            $stmt_items->execute();
            $result_items = $stmt_items->get_result();

            // Split the date and time
            $orderDateTime = new DateTime($order['order_date']);
            $orderDate = $orderDateTime->format('Y-m-d'); // Date in 'YYYY-MM-DD' format
            $orderTime = $orderDateTime->format('H:i:s'); // Time in 'HH:MM:SS' format
            ?>

            <h2>Order Details</h2>
            <table>
                <tr>
                    <th>Customer Name</th>
                    <td><?php echo htmlspecialchars($order['name']); ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><?php echo htmlspecialchars($orderDate); ?></td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td><?php echo htmlspecialchars($orderTime); ?></td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>RM<?php echo number_format($order['total_price'], 2); ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?php echo htmlspecialchars($order['status']); ?></td>
                </tr>
            </table>

            <h3>Items in this Order:</h3>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
                <?php while ($item = $result_items->fetch_assoc()): ?>
                    <tr>
                        <td><img src="../asset/<?php echo htmlspecialchars($item['image_path']); ?>" alt="<?php echo htmlspecialchars($item['sub_model']); ?>" class="order-item-image"></td>
                        <td><?php echo htmlspecialchars($item['sub_model']); ?></td>
                        <td>RM<?php echo number_format($item['price'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>        
    </div>
</div>

<?php
    include '../partials/_footer.php';
?>
