<?php
    include '../config/_base.php';

    // Check if `watch_id` is passed via GET
    if (isset($_GET['watch_id'])) {
        $watch_id = $_GET['watch_id'];

        // Delete the product from the database
        $sql = "DELETE FROM watches WHERE watch_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $watch_id);

        // Check if the deletion is successful
        if ($stmt->execute()) {
            // Redirect back to the product list with a success message
            header("Location: product_list.php?");
            exit();
        } else {
            echo "Error deleting product: " . $stmt->error;
        }
    } else {
        echo "Product not found.";
    }
?>
