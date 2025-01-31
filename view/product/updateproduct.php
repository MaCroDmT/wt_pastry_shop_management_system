<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../login.php");
    exit();
}
require_once('../../control/product/viewproductsController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="../../assets/product/updateproduct.css">
    <script src="../../js/product/updateproduct.js" defer></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="http://localhost/pastryshop/view/admin/home.php">Home</a></li>
                <li><a href="http://localhost/pastryshop/view/product/viewallproduct.php">View All Products</a></li>
                <li><a href="http://localhost/pastryshop/view/product/addproduct.php">Add Product</a></li>
                <li><a href="http://localhost/pastryshop/view/product/updateproduct.php">Update Product</a></li>
                <li><a href="http://localhost/pastryshop/view/product/deleteproduct.php">Delete Product</a></li>
                <li><a href="http://localhost/pastryshop/view/admin/adminprofile.php">Admin Profile</a></li>
                <li><a href="http://localhost/pastryshop/control/logoutController.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="table-container">
            <h1>Update Product</h1>
            <?php if (!empty($products)): ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Production Date</th>
                            <th>Expire Date</th>
                            <th>Select</th>
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
                                <td>
                                    <a class="button" href="updateproduct.php?id=<?php echo $product['id']; ?>&name=<?php echo $product['name']; ?>&category=<?php echo $product['category']; ?>&price=<?php echo $product['price']; ?>&production=<?php echo $product['production']; ?>&expire=<?php echo $product['expire']; ?>">
                                        Select
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>

        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $price = isset($_GET['price']) ? $_GET['price'] : '';
        $production = isset($_GET['production']) ? $_GET['production'] : '';
        $expire = isset($_GET['expire']) ? $_GET['expire'] : '';
        ?>

        <div class="form-container">
            <h2>Edit Product</h2>
            <fieldset>
                <form id="updateProductForm" action="../../control/product/updateproductController.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <p>
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" onfocus="clearError('nameError')" onblur="validateName()">
                    </p>
                    <p><span id="nameError" class="error"></span></p>
                    <p>
                        <label for="category">Category:</label>
                        <input type="text" name="category" id="category" value="<?php echo htmlspecialchars($category); ?>" onfocus="clearError('categoryError')" onblur="validateCategory()">
                    </p>
                    <p><span id="categoryError" class="error"></span></p>
                    <p>
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" value="<?php echo htmlspecialchars($price); ?>" onfocus="clearError('priceError')" onblur="validatePrice()">
                    </p>
                    <p><span id="priceError" class="error"></span></p>
                    <p>
                        <label for="production">Production Date:</label>
                        <input type="date" name="production" id="production" value="<?php echo htmlspecialchars($production); ?>" onfocus="clearError('productionError')" onblur="validateProductionDate()">
                    </p>
                    <p><span id="productionError" class="error"></span></p>
                    <p>
                        <label for="expire">Expire Date:</label>
                        <input type="date" name="expire" id="expire" value="<?php echo htmlspecialchars($expire); ?>" onfocus="clearError('expireError')" onblur="validateExpireDate()">
                    </p>
                    <p><span id="expireError" class="error"></span></p>
                    <p>
                        <input type="submit" name="submit" value="Update Product">
                    </p>
                </form>
            </fieldset>
        </div>
    </main>
</body>
</html>
