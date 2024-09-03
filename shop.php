<link rel="stylesheet" href="asset/css/shop.css">
<body>
    <?php include('partials/_head.php'); ?>

    <!-- Slider for Category Filtering -->
    <div class="slider-container">
        <div class="slider">
            <div class="slide" onclick="filterProducts(0)">All</div>
            <div class="slide" onclick="filterProducts(1)">AQUA TERRA</div>
            <div class="slide" onclick="filterProducts(2)">DIVER 300M</div>
            <div class="slide" onclick="filterProducts(3)">PLANET OCEAN 6000M</div>
            <div class="slide" onclick="filterProducts(4)">HERITAGE MODELS</div>
            <!-- Add more categories as needed -->
        </div>
    </div>

    <div class="main">
        <?php include('partials/_sidebar.php'); ?>

        <!-- Container for filtered products -->
        <div class="container" id="product-container">
            <?php
                    
            $sql = "SELECT * FROM watches";
            
            $result = $conn->query($sql);

            // Render products based on the result set
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    $subModel = strtolower($row['sub_model']);
                    $imagePath = $row['image_path'];

                    echo '<div class="product">';
                    // Main image
                    echo '<img src="asset/'.$imagePath.'" alt="'.$row['sub_model'].'" class="product-main-image">';
                    
                    echo '
                        <h2>'.$row['sub_model'].'</h2>
                        <p>'.$row['size'].' | '.$row['material'].' | '.$row['strap'].'</p>
                        <h2>RM'.number_format($row['price'], 2).'</h2>
                        <button class="cart-btn" onclick="addToCart(\''.$row['sub_model'].'\')">Add to Cart</button>
                        <button class="buy-btn" onclick="buyNow(\''.$row['sub_model'].'\')">Buy</button>
                    </div>';
                }
            } else {
                echo "No products found.";
            }

            ?>
        </div>        
    </div>
</body>

        <!-- FOOTER -->
<footer>
</footer>

<script src="asset/js/index.js"></script>
</html>
