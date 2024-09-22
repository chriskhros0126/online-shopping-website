<?php
require 'config/_base.php';

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

// If the cart is empty, redirect to the cart page
if ($result->num_rows == 0) {
    header('Location: cart.php');
    exit;
}

// Calculate total
$total = 0;
$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $total += $row['price'];
}

include 'partials/_head.php';
?>

<link rel="stylesheet" href="asset/css/checkout.css">
<link rel="stylesheet" href="asset/css/shop.css">

<h2>Checkout</h2>

<div class="main-checkout">
    <div class="checkout-container">
        <form action="process/process_checkout.php" method="POST">
            <h3>Your Details</h3>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="address">Address</label>
            <textarea id="address" name="address" required></textarea>

            <h3>Payment Information</h3>
            <label for="card_number">Card Number</label>
            <input type="text" id="card_number" name="card_number" required pattern="\d{16}" title="Please enter a valid 16-digit card number.">

            <label for="expiry_date">Expiration Date (MM/YY)</label>
            <input type="text" id="expiry_date" name="expiry_date" required pattern="\d{2}/\d{2}" placeholder="MM/YY" title="Enter in MM/YY format.">
            
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" required pattern="\d{3}" title="Please enter a valid 3-digit CVV.">

            <h3>Your Order</h3>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><img src="asset/<?php echo htmlspecialchars($item['image_path']); ?>" alt="<?php echo htmlspecialchars($item['sub_model']); ?>" class="checkout-image"></td>
                        <td><?php echo htmlspecialchars($item['sub_model']); ?></td>
                        <td>RM<?php echo number_format($item['price'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">Total:</td>
                    <td>RM<?php echo number_format($total, 2); ?></td>
                </tr>
            </table>

            <input type="hidden" name="total_price" value="<?php echo $total; ?>">
            <button type="submit" class="checkout-btn">Place Order</button>
        </form>
    </div>
</div>

<?php
include 'partials/_footer.php';
?>
