<?php
require_once('../control/viewproductsController.php');
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="mystyle.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Products</title>
</head>
<body>
    <fieldset>
<legend>
<h1>View All Products</h1>
</legend>

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
    <tr>
      <td> 
        <h1>
          <a id="pr" href="../view/user_panel.php"><button class="returnlog">Go to User Panel</button></a>
        </h1>
      </td>
    </tr>

    </fieldset>
   
</body>
</html>
