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
            gap: 40px 20px;
            padding: 40px 0;
        }

        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            margin-bottom: 40px;
            font-family: 'Helvetica Neue', Arial, sans-serif;
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
    <?php include('partials/_head.php'); ?>

    <!-- Slider for Category Filtering -->
    <div class="slider-container">
        <div class="slider">
            <div class="slide" onclick="filterProducts(0)">All</div>
            <div class="slide" onclick="filterProducts(1)">AQUA TERRA</div>
            <div class="slide" onclick="filterProducts(2)">DIVER 300M</div>
            <div class="slide" onclick="filterProducts(3)">PLANET OCEAN 6000M</div>
            <div class="slide" onclick="filterProducts(4)">HERITAGE MODELS</div>
            <!-- Add more categories as needed -->
        </div>
    </div>

    <div class="main">
        <?php include('partials/_sidebar.php'); ?>

        <!-- Container for filtered products -->
        <div class="container" id="product-container">
            <?php
            // Include database connection
            include('config.php');

            // Get category_id from the query parameter, default to 0 for 'All'
            $category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

            // Modify the SQL query to filter by category_id
            $sql = "SELECT w.model_name, w.sub_model, w.size, w.material, w.strap, w.price, wi.image_path 
                    FROM watches w 
                    LEFT JOIN watch_images wi ON w.watch_id = wi.watch_id";

            // If category_id is not 0, filter by category
            if ($category_id > 0) {
                $sql .= " WHERE w.category_id = ?";
            }

            // Prepare and execute the query
            $stmt = $conn->prepare($sql);
            if ($category_id > 0) {
                $stmt->bind_param("i", $category_id); // Bind the category_id
            }
            $stmt->execute();
            $result = $stmt->get_result();

            // Render products based on the result set
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $subModel = strtolower($row['sub_model']);
                    $imagePath = $row['image_path'];

                    echo '<div class="product">';
                    // Main image
                    echo '<img src="'.$imagePath.'" alt="'.$row['sub_model'].'" class="product-main-image">';
                    
                    echo '
                        <h2>'.$row['model_name'].' '.$row['sub_model'].'</h2>
                        <p>'.$row['size'].' | '.$row['material'].' | '.$row['strap'].'</p>
                        <h2>RM'.number_format($row['price'], 2).'</h2>
                        <a href="productPage/'.$subModel.'1.php" class="product-details">Details</a>
                        <button class="cart-btn" onclick="addToCart(\''.$row['sub_model'].'\')">Add to Cart</button>
                        <button class="buy-btn" onclick="buyNow(\''.$row['sub_model'].'\')">Buy</button>
                    </div>';
                }
            } else {
                echo "No products found.";
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>        
    </div>

    <script>
        // JavaScript to handle category filtering
        function filterProducts(category_id) {
            // Redirect to the same page with the category_id as a query parameter
            window.location.href = `index.php?category_id=${category_id}`;
        }
    </script>
</body>
<footer>
</footer>

<script src="asset/js/index.js"></script>
</html>
