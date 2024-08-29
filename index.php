<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/main.css">
    <link rel="stylesheet" href="asset/css/index.css">
    <title>Alpha</title>
    <style>
        .product-main-image {
            width: 100%;
            height: auto;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 40px 20px; /* Row-gap of 40px and column-gap of 20px */
            padding: 40px 0; /* Top and bottom padding of 40px */
        }

        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            margin-bottom: 40px; /* Increased margin-bottom for better spacing */
            font-family: 'Helvetica Neue', Arial, sans-serif; /* Adjust font */
        }

        .product h2 {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 5px;
            text-transform: uppercase;
            color: #333;
        }

        .product p {
            font-size: 14px;
            color: #777;
            margin-bottom: 15px;
        }

        .product-details {
            font-size: 12px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            margin-top: 10px;
        }

        .product-details:hover {
            text-decoration: underline;
        }

        .cart-btn, .buy-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px 0;
            background-color: #000;
            color: #fff;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: bold;
        }

        .cart-btn:hover, .buy-btn:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <?php include('partials/_head.php') ?>

    <div class="slider-container">
        <div class="slider">
            <div class="slide" onclick="filterProducts('All')">All</div>
            <div class="slide" onclick="filterProducts('Brand A')">Brand A</div>
            <div class="slide" onclick="filterProducts('Brand B')">Brand B</div>
            <div class="slide" onclick="filterProducts('Brand C')">Brand C</div>
            <!-- Add more brands as needed -->
        </div>
    </div>

    <div class="main">
        <?php include('partials/_sidebar.php') ?>

        <div class="container">
            <?php
            // Fetch product data from the database
            $sql = "SELECT model_name, sub_model, size, material, strap, price FROM watches";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $subModel = strtolower($row['sub_model']);
                    $images = [];
                    
                    // Check for images with indexes 1 to 4
                    for ($i = 1; $i <= 4; $i++) {
                        $imagePath = "productPic/{$subModel}{$i}.avif";
                        if (file_exists($imagePath)) {
                            $images[] = $imagePath;
                        }
                    }
                    
                    // If no specific images found, use a default image
                    if (empty($images)) {
                        $images[] = 'productPic/aquaTerra1.avif';
                    }

                    // Randomly select one image from the available options
                    $mainImage = $images[array_rand($images)];

                    echo '<div class="product">';
                    
                    // Main image
                    echo '<img src="'.$mainImage.'" alt="'.$row['sub_model'].'" class="product-main-image">';
                    
                   echo '
                        <h2>'.$row['model_name'].' '.$row['sub_model'].'</h2>
                        <p>'.$row['size'].' | '.$row['material'].' | '.$row['strap'].'</p>
                        <h2>RM'.number_format($row['price'], 2).'</h2>
                        <a href="#" class="product-details">Details</a>
                        <button class="cart-btn" onclick="addToCart(\''.$row['sub_model'].'\')">Add to Cart</button>
                        <button class="buy-btn" onclick="buyNow(\''.$row['sub_model'].'\')">Buy</button>
                    </div>';
                }
            } else {
                echo "No products found.";
            }

            $conn->close();
            ?>
        </div>        
    </div>
  
</body>
<footer>
</footer>

<script src="asset/js/index.js"></script>
</html>
