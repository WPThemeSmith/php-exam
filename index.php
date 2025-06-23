<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
    <?php
        require_once 'includes/head.php';
        // database connection
        require_once 'includes/config.php';
    ?>
    <?php
        //Database connection
        $sql = "SELECT * FROM products";
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
    <!-- Product Table -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>List of Product</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $row): ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="img-fluid" height="100px" width="100px"/></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                                <a href="edit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <?php
        require_once 'includes/footer.php';
    ?>
    
</body>
</html>