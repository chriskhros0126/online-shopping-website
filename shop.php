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
                    <div class="slide"><a href="#"><?php echo htmlspecialchars($row['category_name']); ?></a></div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="main">
        <form method="GET" action="">
            <div class="sidebar">
                <div class="sort">
                    <label for="sort-price">Sort By:</label>
                    <select id="sort-price" name="sort-price">
                        <option value="low-high" <?php echo isset($_GET['sort-price']) && $_GET['sort-price'] == 'low-high' ? 'selected' : ''; ?>>Price: Low-High</option>
                        <option value="high-low" <?php echo isset($_GET['sort-price']) && $_GET['sort-price'] == 'high-low' ? 'selected' : ''; ?>>Price: High-Low</option>
                    </select>
                </div>
                
                <!-- Size Filter -->
                <div class="filter">
                    <label for="filter-size">Size:</label>
                    <select id="filter-size" name="filter-size">
                        <option value="">All Sizes</option>
                        <option value="41" <?php echo isset($_GET['filter-size']) && $_GET['filter-size'] == '41' ? 'selected' : ''; ?>>41mm</option>
                        <option value="42" <?php echo isset($_GET['filter-size']) && $_GET['filter-size'] == '42' ? 'selected' : ''; ?>>42mm</option>
                        <option value="45.5" <?php echo isset($_GET['filter-size']) && $_GET['filter-size'] == '45.5' ? 'selected' : ''; ?>>45.5mm</option>
                    </select>
                </div>

                <!-- Material Filter -->
                <div class="filter">
                    <label for="filter-material">Material:</label>
                    <select id="filter-material" name="filter-material">
                        <option value="">All Materials</option>
                        <option value="steel" <?php echo isset($_GET['filter-material']) && $_GET['filter-material'] == 'steel' ? 'selected' : ''; ?>>Steel</option>
                        <option value="titanium" <?php echo isset($_GET['filter-material']) && $_GET['filter-material'] == 'titanium' ? 'selected' : ''; ?>>Titanium</option>
                        <option value="O‑MEGASTEEL" <?php echo isset($_GET['filter-material']) && $_GET['filter-material'] == 'O‑MEGASTEEL' ? 'selected' : ''; ?>>O-MEGASTEEL</option>
                    </select>
                </div>

                <button type="submit">Sort</button>
            </div>
        </form>

        <div class="container" id="product-container">
            <?php
            // Capture sorting and filtering parameters
            $sortOrder = isset($_GET['sort-price']) ? $_GET['sort-price'] : 'low-high';
            $sortColumn = $sortOrder === 'high-low' ? 'DESC' : 'ASC';
            $filterSize = isset($_GET['filter-size']) ? $_GET['filter-size'] : '';
            $filterMaterial = isset($_GET['filter-material']) ? $_GET['filter-material'] : '';

            // Base query
            $sql = "SELECT * FROM watches";
            $conditions = [];
            
            // Add filtering conditions
            if ($filterSize) {
                $conditions[] = "size = '{$filterSize}'";
            }
            if ($filterMaterial) {
                $conditions[] = "material = '{$filterMaterial}'";
            }
            
            // Apply filters to SQL query
            if (count($conditions) > 0) {
                $sql .= " WHERE " . implode(' AND ', $conditions);
            }
            
            // Add sorting condition
            $sql .= " ORDER BY price $sortColumn";
            
            // Debug: Output SQL query to verify it
            // echo "<!-- SQL Query: $sql -->";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $subModel = strtolower($row['sub_model']);
                    $imagePath = $row['image_path'];
                    $watch_id = $row['watch_id'];
                    ?>
                    <div class="product">
                        <!-- Main image -->
                        <a href="productDetail.php?watch_id=<?php echo $watch_id ?>"><img src="asset/<?php echo $imagePath?>" alt="<?php echo $row['sub_model'] ?>" class="product-main-image"></a>
                        
                        <a href="productDetail.php?watch_id=<?php echo $watch_id ?>"><h3><?php echo $row['sub_model']?></h3></a>
                        <h5><?php echo htmlspecialchars($row['size']); ?>MM | <?php echo htmlspecialchars($row['material']); ?> | <?php echo htmlspecialchars($row['strap']); ?></h5>
                        <h4>RM<?php echo number_format($row['price'], 2); ?></h4>
                        <a class="cart-btn">Add to Cart</a>
                        <a class="buy-btn">Buy</a>
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

<footer>
</footer>

<script src="asset/js/index.js"></script>
</html>
