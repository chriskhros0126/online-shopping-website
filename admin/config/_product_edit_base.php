<?php
// Handle form submission for updating the product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $watch_id = $_POST['watch_id'];
    $sub_model = $_POST['sub_model'];
    $category_id = $_POST['category_id'];
    $size = $_POST['size'];
    $material = $_POST['material'];
    $strap = $_POST['strap'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Retrieve the existing watch details, including image path
    $sql = "SELECT image_path FROM watches WHERE watch_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $watch_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $watch = $result->fetch_assoc();

    // Default to existing image path
    $target_file = $watch['image_path'];

    // Handle image upload if a new image is provided
    if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] == UPLOAD_ERR_OK) {
        // Get the file extension and set the new file name
        $new_image_name = "productPic/{$watch_id}.jpg"; // Change to your desired path and format
        $target_dir = "../asset/{$new_image_name}";

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image_path']['tmp_name'], $target_dir)) {
            $target_file = $new_image_name; // Update the target_file to the new path
        } else {
            echo "Error uploading image.";
        }
    }

    // Update the watch details in the database
    $sql = "UPDATE watches SET sub_model=?, category_id=?, size=?, material=?, strap=?, price=?, description=?, image_path=? WHERE watch_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siissdssi", $sub_model, $category_id, $size, $material, $strap, $price, $description, $target_file, $watch_id);

    if ($stmt->execute()) {
        // Redirect to the product list or show a success message
        header("Location: product_list.php");
        exit();
    } else {
        echo "Error updating product: " . $stmt->error;
    }
}
?>
