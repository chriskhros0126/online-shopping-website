<?php
require 'config/_shop_base.php';

// Check if the user is logged in
if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user']['id'];

// Fetch items in the user's cart
$sql = "SELECT c.cart_id, c.watch_id, w.sub_model, w.price, w.image_path 
        FROM cart c 
        JOIN watches w ON c.watch_id = w.watch_id 
        WHERE c.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

include 'partials/_head.php';
?>

<link rel="stylesheet" href="asset/css/cart.css">
<link rel="stylesheet" href="asset/css/shop.css">
<h2>Your Cart</h2>

<div class="main">
    <div class="cart-container">
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php $total = 0;?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <img src="asset/<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['sub_model']); ?>" class="cart-image">
                        </td>
                        <td><?php echo htmlspecialchars($row['sub_model']); ?></td>
                        <td>RM<?php echo number_format($row['price'], 2); ?></td>
                        <td>
                            <a href="process/remove_from_cart.php?cart_id=<?php echo $row['cart_id']; ?>" class="remove-btn">Remove</a>
                        </td>
                    </tr>
                    <?php $total += $row['price']; ?>
                <?php endwhile; ?>
                <tr>
                    <td colspan="2">Total:</td>
                    <td colspan="2">RM<?php echo number_format($total, 2 ) ?></td>
                </tr>
            </table>
            <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</div>

<?php
include 'partials/_footer.php';
?>
