<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/main.css">
    <link rel="stylesheet" href="asset/css/index.css">
    <title>Alpha</title>
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
            <div class="product" id="product1">
                    <img src="product1.jpg" alt="Product 1">
                    <h2>Product 1</h2>
                    <p>$10.00</p>
                    <button class="cart-btn" onclick="addToCart('Product 1')">Add to Cart</button>
                    <button class="buy-btn" onclick="buyNow('Product 1')">Buy</button>
                </div>
                <div class="product" id="product2">
                    <img src="product2.jpg" alt="Product 2">
                    <h2>Product 2</h2>
                    <p>$15.00</p>
                    <button class="cart-btn" onclick="addToCart('Product 2')">Add to Cart</button>
                    <button class="buy-btn" onclick="buyNow('Product 2')">Buy</button>
                </div>
                <div class="product" id="product3">
                    <img src="product3.jpg" alt="Product 3">
                    <h2>Product 3</h2>
                    <p>$20.00</p>
                    <button class="cart-btn" onclick="addToCart('Product 3')">Add to Cart</button>
                    <button class="buy-btn" onclick="buyNow('Product 3')">Buy</button>
                </div>
        </div>        
    </div>

  
</body>
<footer>

</footer>

<script src="asset/js/index.js"></script>
</html>