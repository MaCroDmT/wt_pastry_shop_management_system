<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../login.php");
    exit();
}
?>

<?php
require_once('../../control/product/viewproductsController.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Products</title>
    <link rel="stylesheet" href="../../assets/product/viewallproduct.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="http://localhost/pastryshop/view/admin/home.php">Home</a></li>
                <li><a href="http://localhost/pastryshop/view/product/addproduct.php">Add Product</a></li>
                <li><a href="http://localhost/pastryshop/view/product/updateproduct.php">Update Product</a></li>
                <li><a href="http://localhost/pastryshop/view/product/deleteproduct.php">Delete Product</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/adminprofile.php">Admin Profile</a></li>
                <li><a href="http://localhost/pastryshop/control/logoutController.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>View All Products</h1>
        <div class="table-container">
            <?php if (!empty($products)): ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Production Date</th>
                            <th>Expire Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                <td><?php echo htmlspecialchars($product['category']); ?></td>
                                <td><?php echo htmlspecialchars($product['price']); ?></td>
                                <td><?php echo htmlspecialchars($product['production']); ?></td>
                                <td><?php echo htmlspecialchars($product['expire']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
