<?php
require_once 'includes/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Get image path
    $sql = "SELECT image FROM products WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $image_path = $row['image'];
        // Delete product from database
        $delete_sql = "DELETE FROM products WHERE id = '$id'";
        if (mysqli_query($connection, $delete_sql)) {
            // Delete image file if exists
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            header('Location: index.php');
            exit;
        } else {
            echo "Error deleting product: " . mysqli_error($connection);
        }
    } else {
        echo "Product not found.";
    }
} else {
    echo "No product id specified.";
}
