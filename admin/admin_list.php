<?php
    include 'partials/_header_admin.php';
?>
<link rel="stylesheet" href="../asset/css/shop.css">
<link rel="stylesheet" href="../asset/css/admin_product_list.css">

<div class="main">
    <?php include('partials/_sidebar_admin.php'); ?>

    <div class="content-wrapper">
        <div class="top-bar">
            <form action="admin_list.php" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search by username..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" class="btn btn-search">Search</button>
            </form>
        </div>

        <!-- Admin Container -->
        <div class="container" id="admin-container">
            <?php
            // Base SQL query
            $sql = "SELECT * FROM users WHERE is_admin = 1";

            // Check if a search term is provided
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $searchTerm = $conn->real_escape_string($_GET['search']);
                $sql .= " AND username LIKE '%$searchTerm%'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagePath = $row['image_path'];
                    ?>
                    <div class="product">
                        <!-- Main image -->
                        <?php 
                        if (empty($imagePath) || $imagePath == "asset/images/") {
                        ?>
                            <img src="../asset/default_profile_pic.jpg" class="product-main-image">
                        <?php
                        } else {
                        ?>
                            <img src="../<?php echo $imagePath; ?>" class="product-main-image">
                        <?php
                        }
                        ?>
                        <h5>Username: <?php echo htmlspecialchars($row['username']); ?> | Created At: <?php echo htmlspecialchars($row['created_at']); ?></h5>
                    </div>
                    <?php
                }
            } else {
                echo "No admins found.";
            }
            ?>
        </div>        
    </div>
</div>

<?php
    include '../partials/_footer.php';
?>
