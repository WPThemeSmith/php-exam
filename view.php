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

    <!-- Product Details -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Product Details</h1>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $row): ?>
                    <div class="card mb-3">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>" height="600px" width="300px"/>
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $row['name']; ?></h3>
                            <p class="card-text">Price: $<?php echo $row['price']; ?></p>
                            <p class="card-text">Description: <?php echo $row['description']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
    
</body>
</html>