
<link rel="stylesheet" href="asset/css/productDetail.css">
<?php 

include('partials/_head.php');

$watch_id = $_GET['watch_id'];
$sql = "SELECT *
        FROM watches w 
        JOIN categories c ON w.category_id = c.category_id 
        WHERE w.watch_id = $watch_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $sub_model = $row["sub_model"];
        $size = $row["size"];
        $material = $row["material"];
        $strap = $row["strap"];
        $price = $row["price"];
        $description = $row["description"];
        $category_name = $row["category_name"];
        $imagePath = $row['image_path'];
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
      
    </style>
</head>
<body>
    <div class="product-container">
        <div class="product-image"><img src="asset/<?php echo $imagePath ?>" alt=""></div> <!-- Update the image URL to dynamic if needed -->
        <div class="product-details">
            <h1 class="product-title"><?php echo $sub_model; ?></h1>
            <p class="product-description">
                <?php echo $description; ?>
                <h2>Specification</h1>
                <p>Size: <?php echo $size ?></p>
                <p>Material: <?php echo $material ?></p>
                <p>Strap: <?php echo $strap ?></p>
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
