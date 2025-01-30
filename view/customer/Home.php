<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Home</title>
</head>
<body>
    <header>
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["email"]); ?>!</h1>
    </header>

    <main>
        <nav>
            <ul>
                <li><a href="http://localhost/pastryshop/view/customer/viewproducts.php">View Products</a></li>
                <li><a href="http://localhost/pastryshop/view/customer/buyproduct.php">Buy Product</a></li>
                <li><a href="http://localhost/pastryshop/view/customer/viewcart.php">View Cart</a></li>
                <li><a href="http://localhost/pastryshop/view/customer/customerprofile.php">Profile</a></li>
                <li><a href="http://localhost/pastryshop/controller/logout.php">Logout</a></li>
            </ul>
        </nav>
    </main>
</body>
</html>
