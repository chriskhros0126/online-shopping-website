<?php
    require 'config/_shop_base.php';

    include 'partials/_head.php';
?>
    <link rel="stylesheet" href="asset/css/shop.css">
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
        <form method="GET" action="">
            <div class="sidebar">
                <div class="sort">
                    <label for="sort-price">Sort By:</label>
                    <select id="sort-price" name="sort-price">
                        <?php
                            html_options($price_options,'');
                        ?>
                    </select>
                </div>
                
                <!-- Size Filter -->
                <div class="filter">
                    <label for="filter-size">Size:</label>
                    <select id="filter-size" name="filter-size">
                        <?php
                            html_options($size_options,'');
                        ?>
                    </select>
                </div>

                <!-- Material Filter -->
                <div class="filter">
                    <label for="filter-material">Material:</label>
                    <select id="filter-material" name="filter-material">
                        <?php
                            html_options($material_options,'');
                        ?>
                    </select>
                </div>

                <button type="submit">Sort</button>
            </div>
        </form>

        <div class="container" id="product-container">
            <?php
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

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $subModel = strtolower($row['sub_model']);
                    $imagePath = $row['image_path'];
                    $watch_id = $row['watch_id'];
                    ?>
                    <div class="product">
                        <!-- Main image -->
                        <a href="product_detail.php?watch_id=<?php echo $watch_id ?>"><img src="asset/<?php echo $imagePath?>" alt="<?php echo $row['sub_model'] ?>" class="product-main-image"></a>
                        <a href="product_detail.php?watch_id=<?php echo $watch_id ?>"><h3><?php echo $row['sub_model']?></h3></a>
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
<?php
    include 'partials/_footer.php';