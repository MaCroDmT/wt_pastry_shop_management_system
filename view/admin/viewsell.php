<?php

require_once('../../control/admin/viewsellController.php');
$productSales = handleProductSales();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Product Sales</title>
</head>
<body>
    <h1>Total Product Sales</h1>

    <?php if (!empty($productSales)): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Total Sell</th>
            </tr>
            <?php foreach ($productSales as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['id']); ?></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($product['category']); ?></td>
                    <td><?php echo htmlspecialchars($product['price']); ?></td>
                    <td><?php echo htmlspecialchars($product['total_quantity_sold']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No product sales data available.</p>
    <?php endif; ?>
</body>
</html>
