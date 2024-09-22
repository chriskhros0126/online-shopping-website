<?php
    include 'partials/_header_admin.php';
?>
<link rel="stylesheet" href="../asset/css/shop.css">
<link rel="stylesheet" href="../asset/css/admin_product_list.css">

<div class="main">
    <?php include('partials/_sidebar_admin.php') ?>

    <div class="content-wrapper">
        <div class="top-bar">
            <form action="product_list.php" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search by model...">
                <button type="submit" class="btn btn-search">Search</button>
            </form>
            <a href="product_add.php" class="btn btn-create">Create Product +</a>
        </div>

        <!-- Product Container -->
        <div class="container" id="product-container">
            <?php
            // Check if a search term is provided
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

            // Prepare the SQL query based on the search term
            if ($searchTerm) {
                $sql = "SELECT * FROM watches WHERE sub_model LIKE ?";
                $stmt = $conn->prepare($sql);
                $searchTerm = "%" . $searchTerm . "%"; // Use wildcards for searching
                $stmt->bind_param("s", $searchTerm);
            } else {
                $sql = "SELECT * FROM watches";
                $stmt = $conn->prepare($sql);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagePath = $row['image_path'];
                    $watch_id = $row['watch_id'];
                    ?>
                    <div class="product">
                        <!-- Main image -->
                        <img src="../asset/<?php echo $imagePath?>" class="product-main-image">
                        <h3><b>Model:</b> <?php echo $row['sub_model']; ?></h3>
                        <h3><b>Strap:</b> <?php echo $row['strap']; ?></h3>
                        <h3><b>Price:</b> RM<?php echo $row['price'] ?></h3>

                        <div class="action-buttons">
                            <a href="product_detail.php?watch_id=<?php echo $watch_id; ?>" class="btn btn-detail">Details</a>
                            <a href="product_update.php?watch_id=<?php echo $watch_id; ?>" class="btn btn-edit">Edit</a>
                            <a href="product_delete.php?watch_id=<?php echo $watch_id; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No products found.";
            }
            ?>
        </div>        
    </div>
</div>

<?php
    include '../partials/_footer.php';
?>
