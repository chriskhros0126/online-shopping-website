<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbonlineshoppingwebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$watch_id = 1; // Change this to the ID of the watch you want to display
$sql = "SELECT w.model_name, w.sub_model, w.size, w.material, w.strap, w.price, w.description, c.category_name 
        FROM watches w 
        JOIN categories c ON w.category_id = c.category_id 
        WHERE w.watch_id = $watch_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $model_name = $row["model_name"];
        $sub_model = $row["sub_model"];
        $size = $row["size"];
        $material = $row["material"];
        $strap = $row["strap"];
        $price = $row["price"];
        $description = $row["description"];
        $category_name = $row["category_name"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aqua Terra1 Page</title>
    

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbonlineshoppingwebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$watch_id = 1; // Change this to the ID of the watch you want to display
$sql = "SELECT w.model_name, w.sub_model, w.size, w.material, w.strap, w.price, w.description, c.category_name 
        FROM watches w 
        JOIN categories c ON w.category_id = c.category_id 
        WHERE w.watch_id = $watch_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $model_name = $row["model_name"];
        $sub_model = $row["sub_model"];
        $size = $row["size"];
        $material = $row["material"];
        $strap = $row["strap"];
        $price = $row["price"];
        $description = $row["description"];
        $category_name = $row["category_name"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Product Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .product-container {
            display: flex;
            flex-direction: column;
            max-width: 900px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product-image {
            width: 100%;
            height: 400px;
            background-image: url('watch-image.jpg');
            background-size: cover;
            background-position: center;
        }
        .product-details {
            padding: 20px;
        }
        .product-title {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .product-description {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .product-price {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .product-buttons {
            display: flex;
            gap: 10px;
        }
        .product-buttons button {
            flex: 1;
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .add-to-cart {
            background-color: #5cb85c;
            color: white;
        }
        .buy-now {
            background-color: #0275d8;
            color: white;
        }
        .add-to-cart:hover {
            background-color: #4cae4c;
        }
        .buy-now:hover {
            background-color: #025aa5;
        }
    </style>
</head>
<body>
    <div class="product-container">
        <div class="product-image" ><img src="productPic/aquaTerra1.avif" alt=""></div> <!-- Update the image URL to dynamic if needed -->
        <div class="product-details">
            <h1 class="product-title"><?php echo $model_name . " " . $sub_model; ?></h1>
            <p class="product-description">
                <?php echo $description; ?>
            </p>
            <div class="product-price">RM <?php echo number_format($price, 2); ?></div>
            <div class="product-buttons">
                <button class="add-to-cart">Add to Cart</button>
                <button class="buy-now">Buy Now</button>
            </div>
        </div>
    </div>
</body>
</html>
