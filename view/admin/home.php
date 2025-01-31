<?php
session_start();
$_SESSION['project'] = "Pastry Shop";

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
    <title>Admin Home</title>
    <link rel="stylesheet" href="../../assets/admin/home.css">
</head>
<body>
    <header>
    <h1 class="wave-text">Welcome [<?php echo $_SESSION['name']; ?>] </h1>     
    </header>

    <main>
        <div class="feature-list">

        <fieldset>
            <legend>Admin Features</legend>
            <ul>
            <li><a href="http://localhost/pastryshop/view/admin/adminprofile.php">Admin Profile</a></li>
            <li><a href="http://localhost/pastryshop/view/admin/viewadmin.php">View Admins</a></li>
            <li><a href="http://localhost/pastryshop/view/admin/addadmin.php">Add Admin</a></li>
            <li><a href="http://localhost/pastryshop/view/admin/updateadmin.php">Update Admin</a></li>
            <li><a href="http://localhost/pastryshop/view/admin/deleteadmin.php">Delete Admin</a></li>
            
            </ul>
        </fieldset>
        <fieldset>
            <legend>Product Features</legend>
            <ul>
            <li><a href="http://localhost/pastryshop/view/product/viewallproduct.php">View All Products</a></li>

            <li><a href="http://localhost/pastryshop/view/product/addproduct.php">Add Product</a></li>

            <li><a href="http://localhost/pastryshop/view/product/updateproduct.php">Update Product</a></li>

            <li><a href="http://localhost/pastryshop/view/product/deleteproduct.php">Delete Product</a></li>
            </ul>
        </fieldset>
            <ul>
            <li><a href="http://localhost/pastryshop/control/logoutController.php">Logout</a></li>
            </ul>
        </div>
    </main>
</body>
</html>
