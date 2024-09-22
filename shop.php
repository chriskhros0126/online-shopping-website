<?php
    require 'config/_shop_base.php';

    include 'partials/_head.php';
?>
<link rel="stylesheet" href="asset/css/shop.css">
<div class="slider-container">
    <div class="slider">
        <div class="slide"><a href="shop.php" class="<?php echo empty($_GET['category_id']) ? 'active' : ''; ?>">All</a></div>
        <?php 
            $categorySQL = "SELECT * FROM categories";
            $categoryResult = $conn->query($categorySQL);
            
            if ($categoryResult->num_rows > 0) {
                while ($row = $categoryResult->fetch_assoc()) {
                    $isActive = (isset($_GET['category_id']) && $_GET['category_id'] == $row['category_id']) ? 'active' : '';
                    ?>
                    <div class="slide">
                        <a href="shop.php?category_id=<?php echo $row['category_id']; ?>" class="<?php echo $isActive; ?>">
                            <?php echo $row['category_name']; ?>
                        </a>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
</div>

<div class="search-section">
    <form method="GET" action="" class="search-form">
        <input type="text" name="search" placeholder="Search products..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit" class="btn-search">Search</button>
    </form>
</div>


<div class="main">

    <form method="GET" action="">
        <div class="sidebar">
            <div class="sort">
                <label for="sort-price">Sort By:</label>
                <select id="sort-price" name="sort-price">
                    <?php
                        html_options($price_options, '');
                    ?>
                </select>
            </div>
            
            <!-- Size Filter -->
            <div class="filter">
                <label for="filter-size">Size:</label>
                <select id="filter-size" name="filter-size">
                    <?php
                        html_options($size_options, '');
                    ?>
                </select>
            </div>

            <!-- Material Filter -->
            <div class="filter">
                <label for="filter-material">Material:</label>
                <select id="filter-material" name="filter-material">
                    <?php
                        html_options($material_options, '');
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

        // Add filtering based on category
        if (isset($_GET['category_id'])) {
            $categoryId = (int) $_GET['category_id'];
            $conditions[] = "category_id = $categoryId";
        }
        
        // Add search condition
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $searchTerm = $conn->real_escape_string(trim($_GET['search']));
            $conditions[] = "(sub_model LIKE '%$searchTerm%')";
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
                    
                    <?php if (is_logged_in() && is_array(value: $_SESSION['user'])) { ?>
                        <a href="process/add_to_cart.php?watch_id=<?php echo $watch_id; ?>" class="cart-btn">Add to Cart</a>
                        <a href="process/buy_now.php?watch_id=<?php echo $watch_id; ?>" class="buy-btn">Buy</a>
                    <?php }else{?>
                        <a href="login.php" class="cart-btn" onclick="alert('Please log in to add items to the cart.');">Add to Cart</a>
                        <a href="login.php" class="buy-btn" onclick="alert('Please log in to proceed with buying.');">Buy</a>
                    <?php }?>
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
?>