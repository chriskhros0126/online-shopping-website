<?php
    include 'partials/_header_admin.php';
    
?>
    <link rel="stylesheet" href="../asset/css/shop.css">

    <div class="main">
      
        <?php include('partials/_sidebar_admin.php') ?>

        <div class="container" id="product-container">
            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagePath = $row['image_path'];
                    $id = $row['id'];
                    ?>
                    <div class="product">
                        <!-- Main image -->
                        <a href=""><img src="../<?php echo $imagePath?>" class="product-main-image"></a>
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

    include '../partials/_footer.php';