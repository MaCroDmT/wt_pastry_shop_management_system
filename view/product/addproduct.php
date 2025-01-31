<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../../assets/product/addproduct.css">
    <script src="../../js/product/addproduct.js" defer></script>
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
        <div class="form-container">
            <?php if (isset($_SESSION['error'])): ?>
                <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <form id="addProductForm" action="../../control/product/addproductController.php" method="post">
                <fieldset>
                    <legend>New Product Registration</legend>
                    <table>
                        <tr>
                            <td>Product Name</td>
                            <td>:</td>
                            <td><input type="text" name="p_name" id="p_name" onfocus="clearError('nameError')" onblur="validateName()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="nameError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>:</td>
                            <td><input type="text" name="p_category" id="p_category" onfocus="clearError('categoryError')" onblur="validateCategory()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="categoryError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>:</td>
                            <td><input type="text" name="p_price" id="p_price" onfocus="clearError('priceError')" onblur="validatePrice()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="priceError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td>Production Date</td>
                            <td>:</td>
                            <td><input type="date" name="p_production" id="p_production" onfocus="clearError('productionError')" onblur="validateProductionDate()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="productionError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td>Expire Date</td>
                            <td>:</td>
                            <td><input type="date" name="p_expire" id="p_expire" onfocus="clearError('expireError')" onblur="validateExpireDate()" /></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span id="expireError" class="error"></span></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="submit" name="submit" value="Add Product" /></td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </main>
</body>
</html>
