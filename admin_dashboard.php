<?php
    require 'config/_admin_dashboard_base.php';

    include 'partials/_head.php';
    
?>
    <link rel="stylesheet" href="asset/css/shop.css">

    <div class="main">
        <form method="GET" action="">
            <div class="sidebar">
                <div class="sort">
                    <label for="sort-Alphabeticle">Sort By Alphabeticle:</label>
                    <select id="sort-Alphabeticle" name="sort-Alphabeticle">
                        <?php
                            html_options($Alphabeticle_options,'');
                        ?>
                    </select>
                </div>
                
                <!-- Date Filter -->
                <div class="sort">
                    <label for="filter-date">Date:</label>
                    <select id="filter-date" name="filter-date">
                        <?php
                            html_options($date_options,'');
                        ?>
                    </select>
                </div>
                <div class="sort">
                    <label for="filter-user">User type</label>
                    <select id="filter-user" name="filter-user">
                        <?php
                            html_options($user_options,'');
                        ?>
                    </select>
                </div>
                <button type="submit">Sort</button>
            </div>
        </form>

        <div class="container" id="product-container">
            <?php
            // Base query

            if ($filterUser == 'Member') {
                $sql = "SELECT * FROM users WHERE is_admin = 0";
            } else if ($filterUser == 'Admin') {
                $sql = "SELECT * FROM users WHERE is_admin = 1";
            } else {
                // Handle case when $filterUser is neither 'Member' nor 'Admin'
                $sql = "SELECT * FROM users";
            }
            

            $sql .= " ORDER BY username $sortColumn, created_at $sortDate";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagePath = $row['image_path'];
                    $id = $row['id'];
                    ?>
                    <div class="product">
                        <!-- Main image -->
                        <a href=""><img src="<?php echo $imagePath?>" class="product-main-image"></a>
                        <h5>Username: <?php echo htmlspecialchars($row['username']); ?> | Created At: <?php echo htmlspecialchars($row['created_at']); ?></h5>
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