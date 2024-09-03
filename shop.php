<link rel="stylesheet" href="asset/css/shop.css">
<body>
    <?php include('partials/_head.php'); ?>

    <div class="slider-container">
        <div class="slider">
            <div class="slide">All</div>
    <?php 
        $category = "SELECT * FROM category WHERE";
    ?>
        </div>
    </div>

    <div class="main">
        <?php include('partials/_sidebar.php'); ?>

        <div class="container" id="product-container">
            <?php
                    
            $sql = "SELECT * FROM watches";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    $subModel = strtolower($row['sub_model']);
                    $imagePath = $row['image_path'];

                    ?>
                    <div class="product">

                    <!-- Main image -->
                    <img src="asset/<?php echo $imagePath?>" alt="<?php echo $row['sub_model'] ?>" class="product-main-image">
                    
                        <h2><?php echo $row['sub_model']?></h2>
                        <p><?php echo $row['size'] ?> | <?php echo $row['material']?> | <?php echo $row['strap']?></p>
                        <h2>RM<?php echo number_format($row['price'], 2) ?></h2>
                        <button class="cart-btn">Add to Cart</button>
                        <button class="buy-btn">Buy</button>
                    </div>
            <?php
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
