<?php
require 'config/_product_detail_base.php';
include 'partials/_head.php';
?>
    <link rel="stylesheet" href="asset/css/product_detail.css">
    <div class="product-container">
        <div class="product-image"><img src="asset/<?php echo $imagePath ?>" alt=""></div>
            <div class="product-details">
                <h1 class="product-title"><?php echo $sub_model; ?></h1>
                <p class="product-description">
                <?php echo $description; ?>
                <h2>Specification</h1>
                <p>Size: <?php echo $size ?></p>
                <p>Material: <?php echo $material ?></p>
                <p>Strap: <?php echo $strap ?></p>
                </p>
            <div class="product-price">RM <?php echo number_format($price, 2); ?></div>
            <div class="product-buttons">
                <?php if (is_logged_in() && is_array(value: $_SESSION['user'])) { ?>
                    <a href="process/add_to_cart.php?watch_id=<?php echo $watch_id; ?>" class="cart-btn">Add to Cart</a>
                    <a href="process/buy_now.php?watch_id=<?php echo $watch_id; ?>" class="buy-btn">Buy</a>
                <?php }else{?>
                    <a href="login.php" class="cart-btn" onclick="alert('Please log in to add items to the cart.');">Add to Cart</a>
                    <a href="login.php" class="buy-btn" onclick="alert('Please log in to proceed with buying.');">Buy</a>
                <?php }?>
            </div>
        </div>
    </div>
<?php
include 'partials/_footer.php';

