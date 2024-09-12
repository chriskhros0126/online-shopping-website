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
                <button class="add-to-cart">Add to Cart</button>
                <button class="buy-now">Buy Now</button>
            </div>
        </div>
    </div>
<?php
include 'partials/_footer.php';

