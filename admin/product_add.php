<?php
    include 'partials/_header_admin.php';
    include 'config/_product_add_base.php'
?>
    <link rel="stylesheet" href="../asset/css/admin_product_form.css">
    <link rel="stylesheet" href="../asset/css/shop.css">

    <div class="main">
        <?php include('partials/_sidebar_admin.php'); ?> <!-- Include the sidebar -->

        <div class="content"> <!-- Main content area -->
            <h2>Add New Product</h2>
            
            <!-- Add Product Form -->
            <form action="product_add.php" method="POST" enctype="multipart/form-data" class="product-form">
                <!-- Product Model -->
                <div class="form-group">
                    <label for="sub_model">Model:</label>
                    <input type="text" id="sub_model" name="sub_model" required>
                </div>

                <!-- Product Category -->
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select id="category_id" name="category_id" required>
                        <?php
                            $sql = "SELECT * FROM categories";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                            }
                        ?>
                    </select>
                </div>

                <!-- Product Size -->
                <div class="form-group">
                    <label for="size">Size (in MM):</label>
                    <input type="text" id="size" name="size" required>
                </div>

                <!-- Product Material -->
                <div class="form-group">
                    <label for="material">Material:</label>
                    <input type="text" id="material" name="material" required>
                </div>

                <!-- Strap -->
                <div class="form-group">
                    <label for="strap">Strap Type:</label>
                    <input type="text" id="strap" name="strap" required>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">Price (RM):</label>
                    <input type="text" id="price" name="price" required>
                </div>

                <!-- Product Image -->
                <div class="form-group">
                    <label for="image">Product Image:</label>
                    <input type="file" id="image" name="image" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="5" required></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-add" onclick="return confirm('Are you sure you want to add this product?');">Add Product</button>
            </form>
        </div>
    </div>

<?php
    include '../partials/_footer.php'; // Include the footer
?>
