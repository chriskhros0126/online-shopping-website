<?php
    require 'config/_profile_base.php';
    include 'partials/_head.php';
?>
    <link rel="stylesheet" href="asset/css/product_detail.css">
    <div class="product-container">
        <div class="product-image">
            <img src="<?php echo $image_path ?>" alt="">
        </div>
            <div class="product-details">
                <h2>Details</h1>
                <p>Created At: <?php echo $date ?></p>
                <p>Username: <?php echo $username ?></p>
                <p>Email: <?php echo $email ?></p>
            <div class="product-buttons">
                <form action="update_profile.php" method="get">
                    <button class="add-to-cart">Update</button>
                </form>
            </div>
        </div>
    </div>

<?php
    include 'partials/_footer.php';