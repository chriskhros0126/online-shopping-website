<?php
    include 'partials/_header_admin.php';
?>
<link rel="stylesheet" href="../asset/css/shop.css">
<link rel="stylesheet" href="../asset/css/admin_product_list.css">
<link rel="stylesheet" href="../asset/css/admin_orders.css">

<div class="main">
    <?php include('partials/_sidebar_admin.php') ?>

    <div class="content-wrapper">
        <div class="container" id="order-container">
            <?php
            $sql_orders = "SELECT * FROM orders WHERE status = 'Delivered' ORDER BY order_date DESC";
            $stmt_orders = $conn->prepare($sql_orders);
        

            $stmt_orders->execute();
            $result_orders = $stmt_orders->get_result();

            if ($result_orders->num_rows > 0) {
                ?>
                <table>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                <?php
                $count = 1;
                while ($order = $result_orders->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo htmlspecialchars($order['name']); ?></td>
                        <td>RM<?php echo number_format($order['total_price'], 2); ?></td>
                        <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                        <td>
                            <form action="config/_order_change_status_base.php" method="POST" onsubmit="return confirm('Are you sure you want to update the order status?');">
                                <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                <select name="status">
                                    <option value="Pending" <?php echo $order['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="Shipped" <?php echo $order['status'] == 'Shipped' ? 'selected' : ''; ?>>Shipped</option>
                                    <option value="Delivered" <?php echo $order['status'] == 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
                                </select>
                                <button type="submit" class="btn btn-submit">Update</button>
                                <a href="view_order.php?order_id=<?php echo $order['order_id'] ?>" class="btn btn-view">View</a>
                            </form>
                        </td>
                    </tr>
                    <?php
                    $count++;
                }
                echo "</table>";
            } else {
                echo "<p>No delivered orders found.</p>";
            }
            ?>
        </div>        
    </div>
</div>

<?php
    include '../partials/_footer.php';
?>
