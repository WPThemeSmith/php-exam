<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once 'includes/head.php';
        // database connection
        require_once 'includes/config.php';
    ?>
    <?php
        //Database connection
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    ?>
</head>
<body>
    <!-- Header -->
    <?php
        require_once 'includes/header.php';
    ?>
    
    <!-- Product Edit Form -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Edit Product</h1>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $row): ?>
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo $row['price']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"><?php echo $row['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image</label>
                            <img src="<?php echo $row['image']; ?>" alt="Product Image" class="img-fluid" style="width: 100px; height: 100px;">
                            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

</body>
</html>