<?php 
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    
   $targetDir = "uploads/";
   $targetFile = $targetDir . basename($image);
   $tmp_name = $_FILES['image']['tmp_name'];

   if (move_uploaded_file($tmp_name, $targetFile)) {
        $image = $targetFile; // Use the full path for the database
        // If a new image is uploaded, delete the old one
    if (!empty($old_image) && file_exists($old_image)) {
        unlink($old_image); // Delete the old image file
    }
        echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }


    // Correct query execution
    $sql = "UPDATE eco SET name = '$name', description = '$description', price = '$price', image = '$image' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=updated");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>