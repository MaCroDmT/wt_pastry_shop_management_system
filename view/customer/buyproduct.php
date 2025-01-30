<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Product</title>
</head>
<body>

<?php
require_once('../../model/productModel.php');


$productModel = new ProductModel();
$result = $productModel->getAllProducts();

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Production Date</th>
                <th>Expire Date</th>
                <th>Action</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['category']}</td>
                <td>{$row['price']}</td>
                <td>{$row['production']}</td>
                <td>{$row['expire']}</td>
                <td>
                    <a href='buyproduct.php?pid={$row['id']}&name={$row['name']}&category={$row['category']}&price={$row['price']}&production={$row['production']}&expire={$row['expire']}'>
                        Add to cart
                    </a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No items found in the database.";
}
?>

<?php
session_start();
$id = isset($_GET['pid']) ? $_GET['pid'] : '';
?>
    <h2>Update Product</h2>
    <fieldset>
        <form action="../../controller/cart/addtocartController.php" method="POST">

            <input type="text" name="pid" value="<?php echo htmlspecialchars($id); ?>" />
            <input type="text" name="cid" value="<?php echo isset($_SESSION['id']) ? htmlspecialchars($_SESSION['id']) : ''; ?>" />
            
            <table>
                <tr>
                    <td><label for="quantity">Quantity:</label></td>
                    <td><input type="text" id="quantity" name="quantity"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Buy Product"></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>