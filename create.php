<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once 'includes/head.php';
        // database connection
        require_once 'includes/config.php';
    ?>
</head>
<body>
    <!-- Header -->
    <?php
        require_once 'includes/header.php';
    ?>

    <!-- Product Creation Form -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Add a New Product</h1>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
                
            </form>
        </div>
    </main>

    <!-- Footer -->
    <?php
        require_once 'includes/footer.php';
    ?>

</body>
</html>