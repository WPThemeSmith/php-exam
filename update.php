<?php
    //Include database connection
    require_once 'includes/config.php';

    //Get the form data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_FILES['image'];
        $old_image = $_POST['old_image'];
        $target_file = $old_image; // Default to old image
        

        //Product image upload
        if(!empty($image['name'])) {
            $target_dir = "product_images/";
            $target_file = $target_dir . basename($image["name"]);
            $tmp_name = $image['tmp_name'];

            //Check if the old image exists and delete it
            if (file_exists($old_image)) {
                unlink($old_image);
            }

            //Move the uploaded file to the target directory
            move_uploaded_file($tmp_name, $target_file);

            //Check file size (2MB limit)
            if ($image["size"] > 2 * 1024 * 1024) {
                die("Sorry, your file is too large. Maximum file size is 2MB.");
            }

            //Check file type (only allow jpg, png, jpeg, gif)
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (!in_array($imageFileType, $allowed_types)) {
                die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            }
        }
        
        //Update product in database
        $sql = "UPDATE products SET name = '$name', price = '$price', description = '$description', image = '$target_file' WHERE id = '$id'";

        if (mysqli_query($connection, $sql)) {
            header('Location: index.php');
            exit;
        } else {
            echo "Error updating product: " . mysqli_error($connection);
        }

        //Close database connection
        mysqli_close($connection);
    } else {
        echo "Invalid request method.";
    }
?>