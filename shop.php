<link rel="stylesheet" href="asset/css/shop.css">
<body>
    <?php include('partials/_head.php'); ?>

    <div class="slider-container">
        <div class="slider">
            <div class="slide"><a href="#" class="active">All</a></div>
            <?php 
            $categorySQL = "SELECT * FROM categories";
            $categoryResult = $conn->query($categorySQL);
            
            if ($categoryResult->num_rows > 0){
                while ($row = $categoryResult->fetch_assoc()){
                    ?>

                    <div class="slide"><a href="#"><?php echo $row['category_name'] ?></a></div>

                    <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="main">
        
        <div class="sidebar">
            <div class="sort">
                <label for="sort-price">Sort By:</label>
                <select id="sort-price" name="sort-price">
                    <option value="high-low">Price: High-Low</option>
                    <option value="low-high">Price: Low-High</option>
                </select>
            </div>
            
            <!-- Size Filter -->
            <div class="filter">
                <label for="filter-size">Size:</label>
                <select id="filter-size" name="filter-size">
                    <option value="">All Sizes</option>
                    <option value="41mm">41mm</option>
                    <option value="42mm">42mm</option>
                    <option value="45.5mm">45.5mm</option>
                </select>
            </div>

            <!-- Material Filter -->
            <div class="filter">
                <label for="filter-material">Material:</label>
                <select id="filter-material" name="filter-material">
                    <option value="">All Materials</option>
                    <option value="steel">Steel</option>
                    <option value="titanium">Titanium</option>
                    <option value="O-MEGASTEEL">O-MEGASTEEL</option>
                </select>
            </div>

            <button type="submit">Sort</button>
        </div>

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
                    
                        <h3><?php echo $row['sub_model']?></h3>
                        <h5><?php echo $row['size'] ?>MM | <?php echo $row['material']?> | <?php echo $row['strap']?></h5>
                        <h4>RM<?php echo number_format($row['price'], 2) ?></h4>
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
