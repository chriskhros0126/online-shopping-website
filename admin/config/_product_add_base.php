<?php
// Handle form submission for adding a new product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $sub_model = $_POST['sub_model'];
    $category_id = $_POST['category_id'];
    $size = $_POST['size'];
    $material = $_POST['material'];
    $strap = $_POST['strap'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Get the file extension
        $image_name = basename($_FILES['image']['name']);
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

        // Generate new file name using sub_model or a unique identifier
        $new_image_name = "productPic/" . uniqid() . ".jpg"; // Using unique ID for the image
        $target_dir = "../asset/{$new_image_name}";

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)) {
            $target_file = $new_image_name; // Update the target file to the new path
        } else {
            echo "Error uploading image.";
            exit();
        }
    } else {
        echo "Image upload is required.";
        exit();
    }

    // Insert the new product into the database
    $sql = "INSERT INTO watches (sub_model, category_id, size, material, strap, price, description, image_path) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siissdss", $sub_model, $category_id, $size, $material, $strap, $price, $description, $target_file);

    if ($stmt->execute()) {
        // Redirect to the product list or show a success message
        header("Location: product_list.php");
        exit();
    } else {
        echo "Error adding product: " . $stmt->error;
    }
}
?>
