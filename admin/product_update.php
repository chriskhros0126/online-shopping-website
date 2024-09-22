<?php
    include 'partials/_header_admin.php';
    include 'config/_product_edit_base.php'
?>
    <link rel="stylesheet" href="../asset/css/admin_product_form.css">
    <link rel="stylesheet" href="../asset/css/shop.css">

    <?php 
        if(isset($_GET['watch_id'])){
            $watch_id = $_GET['watch_id'];

            $sql = "SELECT * FROM watches WHERE watch_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $watch_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $watch = $result->fetch_assoc();

            if (!$watch){
                echo "No watch found with the given ID";
                exit;
            }
        }else{
            header("Location: product_list.php");
            exit;
        }
    ?>

    <div class="main">
        <?php include('partials/_sidebar_admin.php'); ?> <!-- Include the sidebar -->

        <div class="content"> <!-- Main content area -->
            <h2>Add New Product</h2>
            
            <!-- Add Product Form -->
            <form action="product_update.php" method="POST" enctype="multipart/form-data" class="product-form">
            
                <input type="hidden" name="watch_id" value="<?php echo $watch['watch_id']; ?>">
            
            <!-- Product Model -->
                <div class="form-group">
                    <label for="sub_model">Model:</label>
                    <input type="text" id="sub_model" name="sub_model" value="<?php echo $watch['sub_model']; ?>" required>
                </div>

                <!-- Product Category -->
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select id="category_id" name="category_id" required>
                        <?php
                            $sql = "SELECT * FROM categories";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $selected = $row['category_id'] == $watch['category_id'] ? "selected" : "";
                                echo "<option value='{$row['category_id']}' $selected>{$row['category_name']}</option>";
                            }
                        ?>
                    </select>
                </div>

                <!-- Product Size -->
                <div class="form-group">
                    <label for="size">Size (in MM):</label>
                    <input type="text" id="size" name="size" value="<?php echo $watch['size']; ?>" required>
                </div>

                <!-- Product Material -->
                <div class="form-group">
                    <label for="material">Material:</label>
                    <input type="text" id="material" name="material" value="<?php echo $watch['material']; ?>" required>
                </div>

                <!-- Strap -->
                <div class="form-group">
                    <label for="strap">Strap Type:</label>
                    <input type="text" id="strap" name="strap" value="<?php echo $watch['strap']; ?>" required>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">Price (RM):</label>
                    <input type="text" id="price" name="price" value="<?php echo $watch['price']; ?>" required>
                </div>

               <!-- Product Image -->
                <div class="form-group">
                    <label for="image">Product Image:</label>
                    <p>Current Image: <img src="../asset/<?php echo $watch['image_path']; ?>" class="product-image" alt="Watch Image" width="100"></p>
                    <input type="file" name="image_path">
                    <p><i>Leave the field blank if you do not want to change the image.</i></p>
                </div>


                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="5" required><?php echo $watch['description']; ?></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-add" onclick="return confirm('Are you sure you want to update this product?');">Submit</button>
            </form>
        </div>
    </div>

<?php
    include '../partials/_footer.php'; // Include the footer
?>
